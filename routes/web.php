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

Route::get('/', function () {
    return view('frontend.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('master',function (){
   return view('backend.layouts.master');
});

Route::group(['middleware'=>'auth','namespace'=>'Backend','prefix'=>'admin','as'=>'admin.'],function (){

    Route::group(['prefix'=>'crop','as'=>'crop.'],function (){
       Route::get('new_crop','CropController')->name('new_crop');
       Route::post('save_new_crop','CropController@saveNewCrop')->name('save_new_crop');
    });


    Route::group(['prefix'=>'farmer','as'=>'farmer.'],function (){
       Route::get('all','FarmerController')->name('all');
       Route::post('save_new_farmer','FarmerController@saveNewFarmer')->name('save_new_farmer');
    });

    Route::group(['prefix'=>'location','as'=>'location.'],function (){
            Route::get('new_view','LocationController')->name('new_view');
            Route::post('save_farmer_location','LocationController@saveFarmerLocation')->name('save_farmer_location');
            Route::get('all_locations','LocationController@allLocations')->name('all_locations');
    });

});


Route::group(['namespace'=>'Frontend'],function (){
    Route::get('maps/{crop_id}','GeneralController@maps');
    Route::get('get_farmers/{crop_id}','GeneralController@getFarmers');
    Route::get('get_all_locations/{crop_id}','GeneralController@getAllLocations');
});