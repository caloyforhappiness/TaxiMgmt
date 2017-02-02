<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\MShiftTemplate;
use App\MSTDShift;
use Illuminate\Support\Facades\Input;
use Session;
use Log;
use Carbon\Carbon;


class ShiftController extends Controller
{
    //
    public function maintenanceShift()
	{
		$ids = DB::table('tblshifttemplate')
			->select('strShiftTemplateId')
			->orderBy('created_at', 'desc')
			->orderBy('strShiftTemplateId', 'desc')
			->take(1)
			->get();


		$cn =	count($ids);
		if($ids == null){

			$ID = "SHIFT00000";
			$newID = $this->incID($ID);
		}
		else if($cn=='0'){
			$ID = "SHIFT00000";
			$newID = $this->incID($ID);
		}
		else{
			$ID = $ids["0"]->strShiftTemplateId;
			$newID = $this->incID($ID);
		}
		// $current = new Carbon("9:30AM");
		// $to = new Carbon("12:00PM");
		$shifts = DB::table('tblshifttemplate')
			->select('*')
			->get();
		// 	$st = MSTDShift::create(array(
		// 		'strSTDSId'=> "STDS0001",
		// 		'strSTShiftTempateId' => "SHIFT00001",
		// 		'intSTDay' => '1',
		// 		'tmSTShiftIn' => $current,
		// 		'tmSTShiftOut' => $to,
		// 		'status' => '1'
		// 	));		
		// 	dd($st);
		// 	$st->save();
		return View::make('maintenance/create_shift')->with('shift', $shifts)->with('newID', $newID);
		
	}
	public function AddShift() 
	{
		$arr = Input::get('dArr');
		$stid = Input::get('id');
		$in = Input::get('in');
		$out = Input::get('out');
		$sname = Input::get('name');

		Log::info('try');
		$shift = MShiftTemplate::create(array(
			'strShiftTemplateId' => $stid,
			'strShiftTemplateName' => $sname,
			'status' => '1'
		));
		$shift->save();
		for ($i = 0; $i < count($arr); $i++)
		{
			$ids = DB::table('tblstdaysshift')
				->select('strSTDSId')
				->orderBy('created_at', 'desc')
				->orderBy('strSTDSId', 'desc')
				->take(1)
				->get();

			$cn =	count($ids);
			if($ids == null){
				$ID = "STDS0000";
				$newID = $this->incID($ID);
			}
			else if($cn=='0'){
				$ID = "STDS0000";
				$newID = $this->incID($ID);
			}
			else{
				$ID = $ids["0"]->strSTDSId;
				$newID = $this->incID($ID);
			}	
			$from = new Carbon($in);			
			$to = new Carbon($out);
			$st = MSTDShift::create(array(
				'strSTDSId'=> $newID,
				'strSTShiftTempateId' => $stid,
				'intSTDay' => $arr[$i][0],
				'tmSTShiftIn' => $from,
				'tmSTShiftOut' => $to,
				'status' => '1'
			));
			$st->save();
		}

	}
	public function EditShift() 
	{
		$arr = Input::get('dArr');
		$stid = Input::get('id');
		$in = Input::get('in');
		$out = Input::get('out');
		$sname = Input::get('name');

		$shifttemp = MShiftTemplate::find($stid);
		$shifttemp->strShiftTemplateName= $sname;
		$shifttemp->save();
		
		DB::table('tblstdaysshift')->where('strSTShiftTempateId', $stid)->delete();

		for ($i = 0; $i < count($arr); $i++)
		{
			$ids = DB::table('tblstdaysshift')
				->select('strSTDSId')
				->orderBy('created_at', 'desc')
				->orderBy('strSTDSId', 'desc')
				->take(1)
				->get();

			$cn =	count($ids);
			if($ids == null){
				$ID = "STDS0000";
				$newID = $this->incID($ID);
			}
			else if($cn=='0'){
				$ID = "STDS0000";
				$newID = $this->incID($ID);
			}
			else{
				$ID = $ids["0"]->strSTDSId;
				$newID = $this->incID($ID);
			}	
			$from = new Carbon($in);			
			$to = new Carbon($out);
			$st = MSTDShift::create(array(
				'strSTDSId'=> $newID,
				'strSTShiftTempateId' => $stid,
				'intSTDay' => $arr[$i][0],
				'tmSTShiftIn' => $from,
				'tmSTShiftOut' => $to,
				'status' => '1'
			));
			$st->save();
		}

	}
	public function getSDetails() 
	{
		$sdays = DB::table('tblstdaysshift')
			->select('*')
			->where('strSTShiftTempateId', Input::get('sdid'))
			->get();

		return \Response::json([$sdays]);
	}
	public function getESDetails() 
	{
		$stemp = DB::table('tblshifttemplate')
			->select('*')
			->where('strShiftTemplateId', Input::get('sdid'))
			->get();
		$sdays = DB::table('tblstdaysshift')
			->select('*')
			->where('strSTShiftTempateId', Input::get('sdid'))
			->get();

		return \Response::json(['sdays'=> $sdays, 'stemp'=>$stemp]);
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
