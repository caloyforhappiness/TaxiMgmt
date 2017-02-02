<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\MCompanyInfo;
use Illuminate\Support\Facades\Input;
use Session;

class CompanyController extends Controller
{
    //
    public function maintenanceCompany()
	{
		

		$comps = DB::table('tblCompany')
			->select('*')
			->get();

		$com = DB::table('tblCompany')
			->where('strCompanyId', 'COMPANY00001')
			->pluck('strCompanyName');
		Session::put('compname' , $com[0]);

		// $brands = MCarBrand::all();
		

		return View::make('utilities/company_information')->with('company', $comps);

		
	}

	public function updateCompany() 
	{

		$logo = ($_FILES["companylogo"]["name"]);


		if($logo==null){
			$logo = Input::get('logocomp');
			// dd($logo);
      
		$id = Input::get('companyId');
        $company = MCompanyInfo::find($id);
		$company->strCompanyLogo=Input::get('logocomp');
		$company->strCompanyName= Input::get('companyname');
		$company->strCompanyAddress= Input::get('companyaddress');
		$company->strCompanyContNo= Input::get('contactnumber');
		$company->strCompanyEmail= Input::get('emailaddress');
		$company->tmCompanyWHFrom= Input::get('workinghoursfrom');
		$company->tmCompanyWHTo= Input::get('workinghoursto');
		$company->save();
		
		Session::flash('title', 'Success!');
		Session::flash('type', "success");
		Session::flash('message', "Updated succesfully!");
		return \Redirect::back();
		 
		
    
		// dd($logo);
		}




////ditoooooooooooo
		else{
			// dd($logo);
		$target_dir = "images\\upload\\";
		$target_file = $target_dir . basename($_FILES["companylogo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["companylogo"]["tmp_name"]);
    if($check !== false) {
    	Session::flash( 'message',"File is an image - " . $check["mime"] . ".");
       
        $uploadOk = 1;
    } else {
    	Session::flash( 'message',"File is not an image.");
      
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
   $id = Input::get('companyId');
         $company = MCompanyInfo::find($id);
		$company->strCompanyLogo=($_FILES["companylogo"]["name"]);
		$company->save();

		
  //   	Session::flash('title', 'Error!');
		// Session::flash('type', 'error');
		//  Session::flash( 'message',"The file ". ( $_FILES["companylogo"]["name"]). " has been uploaded.");
		//  // Session::put('logo', "images/upload/". ($_FILES["companylogo"]["name"]));
		return \Redirect::back();
    // $uploadOk = ;
}
// Check file size
if ($_FILES["companylogo"]["size"] > 500000) {
	Session::flash( 'message',"Sorry, your file is too large.");

    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	Session::flash( 'message',"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
   
 
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	 Session::flash( 'message',"Sorry, your file was not uploaded.");
   
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["companylogo"]["tmp_name"], $target_file)) {
      
		$id = Input::get('companyId');
        $company = MCompanyInfo::find($id);
		$company->strCompanyLogo=($_FILES["companylogo"]["name"]);
		$company->strCompanyName= Input::get('companyname');
		$company->strCompanyAddress= Input::get('companyaddress');
		$company->strCompanyContNo= Input::get('contactnumber');
		$company->strCompanyEmail= Input::get('emailaddress');
		$company->tmCompanyWHFrom= Input::get('workinghoursfrom');
		$company->tmCompanyWHTo= Input::get('workinghoursto');
		$company->save();
		
		Session::flash('title', 'Success!');
		Session::flash('type', "success");
		Session::flash('message', "Updated succesfully!");
		return \Redirect::back();
		 
		
    } else {
    	Session::flash('title', 'Error!');
		Session::flash('type', 'error');
        Session::flash( 'message',"Sorry, there was an error uploading your file.");
        return \Redirect::back();
    }
}
	}


		// dd($id);
		// $company = MCompanyInfo::find($id);
		
	}

}
