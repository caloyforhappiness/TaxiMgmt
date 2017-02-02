<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@Cname");
Route::get('/Home', "HomeController@Cname");
Route::get('/home', "HomeController@Cname");
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Home', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::get('/driver_info', function () {
    return view('maintenance/driver_info');
});

//validate input
// Route::get('/validateLisc', "TransactionController@validateLisc");
Route::get('/validatePNum', "CarController@validatePNum");
Route::get('/validatePNumE', "CarController@validatePNumE");

// Route::get('/car_brand', function () {
//     return view('maintenance/car_brand');
// });

// carbrand!!!!!!!!
Route::get('/car_brand', "CarController@maintenanceCarbrand");
Route::post('/carbrandAdd', array('uses'=>'CarController@addCarbrand'));
Route::post('/carbrandUp', array('uses'=>'CarController@updateCarbrand'));
Route::post('/carbrandDel', array('uses'=>'CarController@deleteCarbrand'));

// Route::get('/car_model', function () {
//     return view('maintenance/car_model');
// });

// carmodel!!!!!!!!
Route::get('/car_model', "CarController@maintenanceCarmodel");
Route::post('/taximodelAdd', array('uses'=>'CarController@addTaximodel'));
Route::post('/taximodelUp', array('uses'=>'CarController@updateTaximodel'));
Route::post('/taxiModelDel', array('uses'=>'CarController@deleteTaximodel'));

// Route::get('/create_shift', function () {
//     return view('maintenance/create_shift');
// });

// SHIFTTTTTTTTT
Route::get('/create_shift', "ShiftController@maintenanceShift");
// Route::post('/shiftAdd', array('uses'=>'ShiftController@addShift'));
Route::post("/shiftTempAdd", array("uses"=>"ShiftController@AddShift"));
Route::post("shiftTempEdit", array("uses"=>"ShiftController@EditShift"));
Route::get("getSDetails","ShiftController@getSDetails");
Route::get("getESDetails","ShiftController@getESDetails");


// Route::get('/create_boundary', function () {
//     return view('maintenance/create_boundary');
// });

// BOUNDARY
Route::get('/create_boundary', "BoundaryController@maintenanceBoundary");
Route::post("boundaryAdd", array("uses"=>"BoundaryController@boundAdd"));

// Route::post('boundaryAdd','BoundaryController@AddBound');


Route::get('/fee_charges', function () {
    return view('maintenance/fee_charges');
});

Route::get('/accounts', function () {
    return view('maintenance/accounts');
});

// Route::get('/company_information', function () {
//     return view('utilities/company_information');
// });

// Companyyyyy
Route::get('/company_information', "CompanyController@maintenanceCompany");
Route::post('/companyUp', array('uses'=>'CompanyController@updateCompany'));

// Route::get('/reactivation', function () {
//     return view('utilities/reactivation');
// });

Route::get('/reactivation', "InactiveController@Inactive");
Route::post('/carbrandAct', array('uses'=>'InactiveController@carbrandReactive'));
Route::post('/taximodelAct', array('uses'=>'InactiveController@taximodelReactive'));

