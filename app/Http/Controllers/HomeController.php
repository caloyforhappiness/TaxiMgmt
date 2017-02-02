<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\MCompanyInfo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Session;
class HomeController extends Controller
{
    //
    public function Cname()
	{
		

		$comps = DB::table('tblCompany')
			->where('strCompanyId', 'COMPANY00001')
			->pluck('strCompanyName');
		
			Session::put('compname' , $comps[0]);

		// $brands = MCarBrand::all();
		// dd($comps);

		return View::make('welcome');

		
	}
}
