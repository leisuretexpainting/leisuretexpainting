<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('admin/login','AdminController@showAdminLogin');
Route::post('admin/login','AdminController@login');

/*Admin Page Routes*/
Route::group(array('before' => 'auth.admin'), function()
{
    Route::get('admin/logout','AdminController@logout');
    Route::get('admin/data/{name}.json',"AdminDataController@index");

    Route::get('/admin','AdminController@dashboard');
    Route::resource('admin/users', 'AdminUserController');
    Route::resource('/admin/userroles','AdminUserRolesController');
    Route::resource('admin/contractors', 'AdminContractorController');
    Route::resource('admin/contacts', 'AdminContactController');
    Route::resource('/admin/tenders','AdminTenderController');
    Route::resource('/admin/items','AdminItemController');
    Route::resource('/admin/quotations','AdminQuotationController');

    Route::post('admin/user/create','UserController@create');
    Route::get('/admin/download/{directory}/{name?}','DownloadController@download');
});

/*JQuery Fileupload*/
Route::get('upload/{resource}','UploadController@upload');
Route::post('upload/{resource}','UploadController@upload');
Route::delete('upload/{resource}','UploadController@delete');