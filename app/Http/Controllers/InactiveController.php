<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\MCarBrand;
use App\MTaxiModel;
use Illuminate\Support\Facades\Input;
use Session;
class InactiveController extends Controller
{
    //
    public function Inactive() 
	{

   			// Carbrand
			$brands = DB::table('tblCarBrand')
			->select('*')
			->where('status','=','0')
			->get();
			$cn =	count($brands);

			// taxiModel

			$model = DB::table('tbtaxiowned')
			->join('tblCarBrand', 'tbtaxiowned.strCarBrandId','=','tblCarBrand.strCarBrandId')
			->select('tbtaxiowned.*', 'tblCarBrand.strCarBrandName')
			->where('tbtaxiowned.status','=','0')
			->get();

			$taxicn =	count($model);


    return View::make('utilities/reactivation')
    ->with('carbrands', $brands)->with('cn', $cn)
    ->with('models', $model)->with('taxicn', $taxicn);
}


	public function carbrandReactive() 
	{
		$getID = Input::get('carbrandIdAct');
		// dd($getID);
		$activate = MCarBrand::find($getID);
		$activate->status='1';
		$activate->save();

			Session::flash('title', 'Success!');
			Session::flash('type', 'success');
		Session::flash('message', "Activated succesfully!");
		return \Redirect::back();
	}

	


	public function taximodelReactive() 
	{
		$getID = Input::get('taximodelIdAct');
		$cb = DB::table('tblCarBrand')
			->join('tbtaxiowned', 'tbtaxiowned.strCarBrandId','=','tblCarBrand.strCarBrandId')
			->where('tbtaxiowned.strTaxiOwnedId','=',$getID)
			->where('tblCarBrand.status','0')
			// ->select('tblCarBrand.status')
			->get();

		if(count($cb) == 0){
		$activate = MTaxiModel::find($getID);
		$activate->status='1';
		$activate->save();

			Session::flash('title', 'Success!');
			Session::flash('type', 'success');
		Session::flash('message', "Activated succesfully!");
		return \Redirect::back();
		}
		else{
			Session::flash('title', 'Error!');
			Session::flash('type', 'error');
			Session::flash('message', "Activating taxi model failed! Car Brand is not activated.");
			return \Redirect::back();
		}	
	}
}
