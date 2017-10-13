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

Route::get('/',['uses'=> 'Admin\DashboardController@Redirect']);

Route::group(['prefix' => '/admin/','middleware' => 'auth'], function () {

    Route::get('/dashboard',['as'=> 'admin.dashboard.index', 'uses'=> 'Admin\DashboardController@DashboardIndex']);
    Route::get('/sample-form',['as'=> 'admin.sample-form.index', 'uses'=> 'Admin\SampleController@Index']);

    /* Start :: Master City Route*/
    Route::get('/master-city',['as'=>'admin.master-city.index','uses'=>'Admin\MasterCityController@Index_MasterCity']);
    Route::post('/master-city',['as'=>'admin.master-city.insert','uses'=>'Admin\MasterCityController@Insert_MasterCity']);
    Route::get('/master-city/{id}/get',['as'=>'admin.master-city.get','uses'=>'Admin\MasterCityController@Edit_MasterCity']);
    Route::patch('/master-city/{id}/update',['as'=>'admin.master-city.update','uses'=>'Admin\MasterCityController@update_MasterCity']);
    Route::post('/master-city/update-status', ['as' => 'admin.master-city.change_status', 'uses' => 'Admin\MasterCityController@UpdateStatus_MasterCity']);
    Route::get('/master-city/{id}/delete', ['as' => 'admin.master-city.delete', 'uses' => 'Admin\MasterCityController@Delete_MasterCity']);
    /* End :: Master City Route*/


    /*Start :: Product Category*/
    Route::get('/products-category',['as'=>'admin.products-category.index','uses'=>'Admin\ProductsCategoryController@Index_ProductsCategory']);
    Route::post('/products-category',['as'=>'admin.products-category.insert','uses'=>'Admin\ProductsCategoryController@Insert_ProductsCategory']);
    Route::get('/products-category/{id}/get',['as'=>'admin.products-category.get','uses'=>'Admin\ProductsCategoryController@Edit_ProductsCategory']);
    Route::patch('/products-category/{id}/update',['as'=>'admin.products-category.update','uses'=>'Admin\ProductsCategoryController@update_ProductsCategory']);
    Route::get('/products-category/{id}/delete', ['as' => 'admin.products-category.delete', 'uses' => 'Admin\ProductsCategoryController@Delete_ProductsCategory']);
    Route::post('/products-category/update-status', ['as' => 'admin.products-category.change_status', 'uses' => 'Admin\ProductsCategoryController@UpdateStatus_ProductsCategory']);
    /*End :: Product Category*/

    /*Start :: Product*/
    Route::get('/products',['as'=>'admin.products.index','uses'=>'Admin\ProductsController@Index_Products']);
    Route::post('/products',['as'=>'admin.products.insert','uses'=>'Admin\ProductsController@Insert_Product']);
    Route::get('/products/{id}/get',['as'=>'admin.products.get','uses'=>'Admin\ProductsController@Edit_Products']);
    Route::patch('/products/{id}/update',['as'=>'admin.products.update','uses'=>'Admin\ProductsController@update_Products']);
    Route::get('/products/{id}/delete', ['as' => 'admin.products.delete', 'uses' => 'Admin\ProductsController@Delete_Products']);
    Route::post('/products/update-status', ['as' => 'admin.products.change_status', 'uses' => 'Admin\ProductsController@UpdateStatus_Products']);
    /*End :: Product*/

    /*Start :: Services Category*/
    Route::get('/services-category',['as'=>'admin.services-category.index','uses'=>'Admin\ServicesCategoryController@Index_ServicesCategory']);
    Route::post('/services-category',['as'=>'admin.services-category.insert','uses'=>'Admin\ServicesCategoryController@Insert_ServicesCategory']);
    Route::get('/services-category/{id}/get',['as'=>'admin.services-category.get','uses'=>'Admin\ServicesCategoryController@Edit_ServicesCategory']);
    Route::patch('/services-category/{id}/update',['as'=>'admin.services-category.update','uses'=>'Admin\ServicesCategoryController@update_ServicesCategory']);
    Route::get('/services-category/{id}/delete', ['as' => 'admin.services-category.delete', 'uses' => 'Admin\ServicesCategoryController@Delete_ServicesCategory']);
    Route::post('/services-category/update-status', ['as' => 'admin.services-category.change_status', 'uses' => 'Admin\ServicesCategoryController@UpdateStatus_ServicesCategory']);
    /*End :: Services Category*/

    /*Start :: Services Category*/
    Route::get('/services',['as'=>'admin.services.index','uses'=>'Admin\ServicesController@Index_Services']);
    Route::post('/services',['as'=>'admin.services.insert','uses'=>'Admin\ServicesController@Insert_Services']);
    Route::get('/services/{id}/get',['as'=>'admin.services.get','uses'=>'Admin\ServicesController@Edit_services']);
    Route::patch('/services/{id}/update',['as'=>'admin.services.update','uses'=>'Admin\ServicesController@update_Services']);
    Route::get('/services/{id}/delete', ['as' => 'admin.services.delete', 'uses' => 'Admin\ServicesController@Delete_Services']);
    Route::post('/services/update-status', ['as' => 'admin.services.change_status', 'uses' => 'Admin\ServicesController@UpdateStatus_Services']);
    /*End :: Services Category*/

    /*Start :: Manufacturer*/
    Route::get('/manufacturer',['as'=>'admin.manufacturer.index','uses'=>'Admin\ManufacturerController@Index_Manufacture']);
    Route::post('/manufacturer',['as'=>'admin.manufacturer.insert','uses'=>'Admin\ManufacturerController@Insert_Manufacture']);
    Route::get('/manufacturer/{id}/get',['as'=>'admin.manufacturer.get','uses'=>'Admin\ManufacturerController@Edit_Manufacture']);
    Route::patch('/manufacturer/{id}/update',['as'=>'admin.manufacturer.update','uses'=>'Admin\ManufacturerController@update_Manufacture']);
    Route::get('/manufacturer/{id}/delete', ['as' => 'admin.manufacturer.delete', 'uses' => 'Admin\ManufacturerController@Delete_Manufacturer']);
    Route::post('/manufacturer/update-status', ['as' => 'admin.manufacturer.change_status', 'uses' => 'Admin\ManufacturerController@UpdateStatus_Manufacturer']);
    /*End :: Manufacturer*/

    /*Start :: Car Model*/
    Route::get('/car-model',['as'=>'admin.car-model.index','uses'=>'Admin\CarModelsController@Index_CarModel']);
    Route::post('/car-model',['as'=>'admin.car-model.insert','uses'=>'Admin\CarModelsController@Insert_CarModel']);
    Route::get('/car-model/{id}/get',['as'=>'admin.car-model.get','uses'=>'Admin\CarModelsController@Edit_CarModel']);
    Route::patch('/car-model/{id}/update',['as'=>'admin.car-model.update','uses'=>'Admin\CarModelsController@update_CarModel']);
    Route::get('/car-model/{id}/delete', ['as' => 'admin.car-model.delete', 'uses' => 'Admin\CarModelsController@Delete_CarModel']);
    Route::post('/car-model/update-status', ['as' => 'admin.car-model.change_status', 'uses' => 'Admin\CarModelsController@UpdateStatus_CarModel']);
    /*End :: Car Model*/

    /*Start :: Job Card*/
    Route::get('/job-card',['as'=>'admin.job-card.index','uses'=>'Admin\JobCardController@Index_JobCard']);
    Route::post('/job-card',['as'=>'admin.job-card.insert','uses'=>'Admin\JobCardController@Insert_JobCard']);
    Route::get('/job-card/{id}/get',['as'=>'admin.job-card.get','uses'=>'Admin\JobCardController@Edit_JobCard']);
    Route::patch('/job-card/{id}/update',['as'=>'admin.job-card.update','uses'=>'Admin\JobCardController@Update_JobCard']);
    /*End :: Job Card*/

    /*Start :: Master Member Role Route*/
    Route::get('/member-role',['as'=>'admin.member-role.index','uses'=>'Admin\MemberRolesController@Index_MemberRole']);
    Route::post('/member-role',['as'=>'admin.member-role.insert','uses'=>'Admin\MemberRolesController@Insert_MemberRole']);
    Route::post('/member-role/update-status', ['as' => 'admin.member-role.change_status', 'uses' => 'Admin\MemberRolesController@UpdateStatus_MemberRole']);
    Route::get('/member-role/{id}/get',['as'=>'admin.member-role.get','uses'=>'Admin\MemberRolesController@Edit_MemberRole']);
    Route::patch('/member-role/{id}/update',['as'=>'admin.member-role.update','uses'=>'Admin\MemberRolesController@update_MemberRole']);
    Route::get('/member-role/{id}/delete', ['as' => 'admin.member-role.delete', 'uses' => 'Admin\MemberRolesController@Delete_MemberRole']);

    /*Start :: User Functionality Route*/
    Route::get('/user',['as'=> 'admin.user.index', 'uses'=> 'Admin\UserController@Index']);
    Route::post('/user',['as'=> 'admin.user.insert', 'uses'=> 'Admin\UserController@Insert']);
    Route::get('/user/{id}/edit', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@GetUser']);
    Route::get('/user/{id}/delete', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@Delete']);
    Route::patch('/user/{id}/update', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@Update']);
    Route::post('/user/update-status', ['as' => 'admin.user.change_status', 'uses' => 'Admin\UserController@UpdateStatus']);
    /*End::user Functionality*/

    /*Start :: User Functionality Route*/
    Route::get('/customer',['as'=> 'admin.customer.index', 'uses'=> 'Admin\CustomersControllers@Index']);
    Route::post('/customer',['as'=>'admin.customer.insert','uses'=>'Admin\CustomersControllers@Insert_Customer']);
    Route::get('/customer/{id}/edit', ['as' => 'admin.customer.get', 'uses' => 'Admin\CustomersControllers@Edit_Customer']);
    Route::patch('/customer/{id}/update', ['as' => 'admin.customer.update', 'uses' => 'Admin\CustomersControllers@update_Customer']);
    Route::get('/customer/{id}/delete', ['as' => 'admin.customer.delete', 'uses' => 'Admin\CustomersControllers@Delete_Customer']);

    /*Start :: User Functionality Route*/
    Route::get('/inspection',['as'=> 'admin.inspection.index', 'uses'=> 'Admin\InspectionController@Index_Inpection']);



});
Auth::routes();

Route::get('/home', 'HomeController@index');
