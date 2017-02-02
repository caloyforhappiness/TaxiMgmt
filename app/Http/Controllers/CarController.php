<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\MCarBrand;
use App\MTaxiModel;
use Illuminate\Support\Facades\Input;
use Session;

class CarController extends Controller
{

	// C A R  B R A N D
	public function maintenanceCarbrand()
	{
		$ids = DB::table('tblCarBrand')
			->select('strCarBrandId')
			->orderBy('created_at', 'desc')
			->orderBy('strCarBrandId', 'desc')
			->take(1)
			->get();


		$cn =	count($ids);
		if($ids == null){

			$ID = "CBRAND00000";
			$newID = $this->incID($ID);
		}
		else if($cn=='0'){
			$ID = "CBRAND00000";
			$newID = $this->incID($ID);
		}
		else{
			$ID = $ids["0"]->strCarBrandId;
			$newID = $this->incID($ID);
		}

		$brands = DB::table('tblCarBrand')
			->select('*')
			->get();

		// $brands = MCarBrand::all();
		

		return View::make('maintenance/car_brand')->with('carbrands', $brands)->with('newID', $newID);
		
	}
	public function validatePNum() {

	    $avail = DB::table('tbtaxiowned')
	    			->where('strTaxiOwnedPNum', Input::get('plateNumber'))
	    			->count();

		if($avail == 0)
		    {
		        $isAvailable = true;
		    }else{
		        $isAvailable = False;
		    }   
		        // Finally, return a JSON
		        echo json_encode(array(
		        'valid' => $isAvailable,
		        ));
	}
	public function validatePNumE() {

	    $firstcheck = DB::table('tbtaxiowned')
	    			->where('strTaxiOwnedId', Input::get('taxiModelIdEdit'))
					->pluck('strTaxiOwnedPNum');

	    if($firstcheck[0] == Input::get('plateNumberEdit'))
	    {
	        $isAvailable = true;
	    }
	    else
	    {
	    	$avail = DB::table('tbtaxiowned')
	    			->where('strTaxiOwnedPNum', Input::get('plateNumberEdit'))
	    			->count();
			if($avail == 0)
		    {
		        $isAvailable = true;
		    }else{
		        $isAvailable = False;
		    }   
	    }
        // Finally, return a JSON
        echo json_encode(array(
        'valid' => $isAvailable,
        ));
	}
	public function addCarbrand() 
	{

		$id = Input::get('carbrandId');
		
		$brand = MCarBrand::create(array(
			'strCarBrandId' => Input::get('carbrandId'),
			'strCarBrandName' => Input::get('brandname'),
			'strCarBrandDesc' => Input::get('desc'),
			'status' => '1'
		));
		$brand->save();
		Session::flash('title', 'Success!');
		Session::flash('type', "success");
		Session::flash('message', "Added succesfully!");
		return \Redirect::back();
	}

	public function updateCarbrand() 
	{
		$id = Input::get('carbrandIdEdit');
		
		$carbrand = MCarBrand::find($id);
		$carbrand->strCarBrandName= Input::get('brandnameEdit');
		$carbrand->strCarBrandDesc= Input::get('descEdit');
		$carbrand->save();
		
		Session::flash('message', "Updated succesfully!");
		return \Redirect::back();
	}
	public function deleteCarbrand() 
	{
		$getID = Input::get('carbrandIdDelete');
		
		$modelBrand = DB::table('tbtaxiowned')
			->where('strCarBrandId',$getID)
			->where('status','1')
			->get();
		if(count($modelBrand) == 0){
			$brand = MCarBrand::find($getID);
			$brand->status='0';
			$brand->save();
			Session::flash('title', 'Success!');
			Session::flash('type', 'success');
			Session::flash('message', "Deleted succesfully!");
			return \Redirect::back();
		}
		else{
			Session::flash('title', 'Error!');
			Session::flash('type', 'error');
			Session::flash('message', "Deleting car brand failed! Car brand is used as reference in another maintenance.");
			return \Redirect::back();
		}
		//dd($getID);
		
	}

	// C A R  B R A N D

	// C A R  M O D E L
public function maintenanceCarmodel()
	{

		$ids = DB::table('tbtaxiowned')
			->select('strTaxiOwnedId')
			->orderBy('created_at', 'desc')
			->orderBy('strTaxiOwnedId', 'desc')
			->take(1)
			->get();
		$cn =	count($ids);
	
		
		if($ids == null || $ids == ""){
			
			$ID = "TMODEL00000";
			$newID = $this->incID($ID);
			}
		else if($cn=='0'){
			$ID = "TMODEL00000";
			$newID = $this->incID($ID);
		}
		else{
			$ID = $ids["0"]->strTaxiOwnedId;
			$newID = $this->incID($ID);
		}

	$brands = DB::table('tblCarBrand')
			->select('*')
			->get();

	// $brands = MCarBrand::all();
		// $check = "TMODEL00003";
	 //    $firstcheck = DB::table('tbtaxiowned')
	 //    			->where('strTaxiOwnedId', $check)
	 //    			->pluck('strTaxiOwnedPNum');
	 //    $and = "CSD-232";
	    // dd($firstcheck[0], $and);
			$model = DB::table('tbtaxiowned')
			->join('tblCarBrand', 'tbtaxiowned.strCarBrandId','=','tblCarBrand.strCarBrandId')
			->select('tbtaxiowned.*', 'tblCarBrand.strCarBrandName')
			// ->orderBy('tblCarModel.strCarModelDesc')
			->get();
	// $model = MCarBrand::all();

	return View::make('maintenance/car_model')->with('carbrands', $brands)->with('models', $model)->with('newID', $newID);
}


public function addTaximodel()
	{
		$model= MTaxiModel::create(array(
			'strTaxiOwnedId'=> Input::get('taxiModelId'),
			'strTaxiOwnedMName'=> Input::get('modelName'),
			'strTaxiOwnedPNum'=> Input::get('plateNumber'),
			'strTaxiOwnedDesc'=> Input::get('desc'),
			'strCarBrandId'=> Input::get('selectcbrand'),
			'status' => '1'
		));

		$model->save();
		Session::flash('message', "Added succesfully!");
		return \Redirect::back();	
	}

	public function updateTaximodel()
	{
		$id = Input::get('taxiModelIdEdit');
		$model = MTaxiModel::find($id);
		$model->strTaxiOwnedMName = Input::get('modelNameEdit');
		$model->strTaxiOwnedPNum = Input::get('plateNumberEdit');
		$model->strTaxiOwnedDesc = Input::get('descEdit');
		$model->strCarBrandId= Input::get('selectcbrandEdit');


		$model->save();
		Session::flash('message', "Updated succesfully!");
		return \Redirect::back();
	}

	public function deleteTaximodel() 
	{
		$getID = Input::get('taxiModelIdDelete');
		
		$modelDriver = DB::table('tbldrivertaxi')
			->where('tblDriverTaxiOwnedId',$getID)
			->where('status','1')
			->get();
		if(count($modelDriver) == 0){
			$brand = MTaxiModel::find($getID);
			$brand->status='0';
			$brand->save();
			Session::flash('title', 'Success!');
			Session::flash('type', 'success');
			Session::flash('message', "Deleted succesfully!");
			return \Redirect::back();
		}
		else{
			Session::flash('title', 'Error!');
			Session::flash('type', 'error');
			Session::flash('message', "Deleting car brand failed! Car brand is used as reference in another maintenance.");
			return \Redirect::back();
		}
		//dd($getID);
		
	}

	private function incID($id)
	{

		$arrID = str_split($id);

		$new = "";
		$somenew = "";
		$arrNew = [];
		$boolAdd = TRUE;

		for($ctr = count($arrID) - 1; $ctr >= 0; $ctr--)
		{
			$new = $arrID[$ctr];

			if($boolAdd)
			{

				if(is_numeric($new) || $new == '0')
				{
					if($new == '9')
					{
						$new = '0';
						$arrNew[$ctr] = $new;
					}
					else
					{
						$new = $new + 1;
						$arrNew[$ctr] = $new;
						$boolAdd = FALSE;
					}//else
				}//if(is_numeric($new))
				else
				{
					$arrNew[$ctr] = $new;
				}//else
			}//if ($boolAdd)
			
			$arrNew[$ctr] = $new;
		}//for

		for($ctr2 = 0; $ctr2 < count($arrID); $ctr2++)
		{
			$somenew = $somenew . $arrNew[$ctr2] ;
		}
		return $somenew;
	}

}
