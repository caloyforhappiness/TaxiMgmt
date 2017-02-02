<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\MBoundary;
use App\MBDBoundary;
use Illuminate\Support\Facades\Input;
use Session;
use Log;

class BoundaryController extends Controller
{
    //
	 public function maintenanceBoundary()
	{
		$ids = DB::table('tblboundary')
			->select('strBoundaryId')
			->orderBy('created_at', 'desc')
			->orderBy('strBoundaryId', 'desc')
			->take(1)
			->get();


		$cn =	count($ids);
		if($ids == null){

			$ID = "BOUND00000";
			$newID = $this->incID($ID);
		}
		else if($cn=='0'){
			$ID = "BOUND00000";
			$newID = $this->incID($ID);
		}
		else{
			$ID = $ids["0"]->strBoundaryId;
			$newID = $this->incID($ID);
		}
		$bounds = DB::table('tblboundary')
			->select('*')
			->get();
		
		return View::make('maintenance/create_boundary')->with('bound', $bounds)->with('newID', $newID);
		
	}
	public function boundAdd(){

		// dd("laaaa");
		$stid = Input::get('id');
		$bname = Input::get('name');
		$bdesc = Input::get('desc');
		$feearr = Input::get('fArr');
		$amtarr = Input::get('aArr');
		$totalamt = Input::get('tAmt');

		// Log::info('try');
		$shift = MBoundary::create(array(
			'strBoundaryId' => $stid,
			'strBoundaryName' => $bname,
			'strBoundaryDesc' => $bdesc,
			'dblBoundaryAmt' => $totalamt,
			'status' => '1'
		));
		$shift->save();
		for ($i = 0; $i < count($feearr); $i++)
		{
			$ids = DB::table('tblbreakboundary')
				->select('strBreakBoundaryId')
				->orderBy('created_at', 'desc')
				->orderBy('strBreakBoundaryId', 'desc')
				->take(1)
				->get();

			$cn =	count($ids);
			if($ids == null){
				$ID = "BDB0000";
				$newID = $this->incID($ID);
			}
			else if($cn=='0'){
				$ID = "BDB0000";
				$newID = $this->incID($ID);
			}
			else{
				$ID = $ids["0"]->strBreakBoundaryId;
				$newID = $this->incID($ID);
			}	
			$st = MBDBoundary::create(array(
				'strBreakBoundaryId'=> $newID,
				'strBreakBoundaryName' => $feearr[$i][0],
				'dblBreakBoundaryAmt' => $amtarr[$i][0],
				'status' => '1',
				'strBoundaryId' => $stid
			));
			$st->save();
		}
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
