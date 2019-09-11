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
    return view('newwelcome');
});

Route::get('/admin', function () {
    return view('layouts.app-layout');
});
Route::get('/test', function () {
    return 'This is TEst';
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * @author Ruhin
 * @param ACL_Routes
 */

Route::prefix('suadmin')->name('sa.')->group(function(){
    Route::get('/acl-list','Admin\ACL\AccessControlListController@index')->name('acl-list');
    Route::get('/acl/{user}/edit','Admin\ACL\AccessControlListController@edit')->name('acl-edit');
    Route::match(['PUT','PATCH'],'/acl/{user}/update','Admin\ACL\AccessControlListController@aclUpdate')->name('acl-update');

    Route::get('/role/index','Admin\ACL\RoleController@index')->name('role');
    Route::get('/role/{role}/edit','Admin\ACL\RoleController@edit')->name('role.edit');
});

/**
 * @author Ruhin
 * @param Axios_Routes
 */
Route::prefix('axios')->group(function(){
    Route::get('/roles','Axios\AxiosController@roles');
});

/**
 * @return settings all resurces controller
 * by @param Ruhin
 */
Route::resources([

    'department'=>'Settings\DepartmentController',
    'divisions'=>'Settings\DivisionController',
    'workingplace'=>'Settings\WorkingPlaceController',
    'employmenttype'=>'Settings\EmploymentTypeController',
    'designation'=>'Settings\DesignationController',
    'leave'=>'Settings\LeaveController',
    ]);


/**
 * @return employee controller
 * by @param Ruhin
 */
 Route::get('/employee','Employee\EmployeeController@index')->name('employee.index');

 Route::get('/employeeadd','Employee\EmployeeController@create')->name('employee.create');
 Route::post('/employeeadd','Employee\EmployeeController@store')->name('employee.store');

 Route::get('/profile/{id}','Employee\EmployeeController@profile')->name('profile');

 Route::delete('/employee/{id}','Employee\EmployeeController@destroy')->name('employee.delete');

 Route::get('epmdashboard','Employee\EmployeeController@dashboard')->name('employee.dashboard');


 Route::get('/employeeedit/{id}','Employee\EmployeeController@edit')->name('employee.edit');
 Route::post('/employeeedit/{id}','Employee\EmployeeController@update')->name('employee.update');
 


 /**
 * @return Payroll controller
 * by @param Ruhin
 */

 Route::get('/salarysettings','SalaryController@index')->name('salary.index');
 Route::post('/salarysettings','SalaryController@store')->name('salary.store');


  /**
 * @return attendance controller
 * by @param Ruhin
 */

 Route::get('/attendance','AttendanceController@index')->name('attendance.index');

 /**
  * @author Ruhin
  * @param LeaveManagementController methods
  */

  Route::prefix('leave-management')->name('leavem.')->group(function(){
        Route::get('/index','HRM\LeaveManagementController@index')->name('index');
        Route::get('/create','HRM\LeaveManagementController@createview')->name('createview');
        Route::post('/users','HRM\LeaveManagementController@userSearch')->name('usersearch');
        Route::post('/leaves','HRM\LeaveManagementController@leaveSearch')->name('leavesearch');
        Route::post('/calculation','HRM\LeaveManagementController@leaveCalculate')->name('calculate');
        Route::post('/store','HRM\LeaveManagementController@store')->name('store');


  });

  /**
   * =====================================================
   *        ** Sales & Accounts ** author by Ruhin
   * =====================================================
   */
  Route::namespace('Sales_Accounts')->prefix('acc_sales')->name('acc.')->group(function(){
        Route::get('client/info/index','ClientController@index')->name('client_info_list');
        Route::get('client/info/create','ClientController@create')->name('client_info_create');
        Route::post('client/info/store','ClientController@store')->name('client_info_store');
        Route::get('client/show/{client}','ClientController@show')->name('client_info_show');
        Route::get('client/edit/{client}','ClientController@edit')->name('client_info_edit');
        Route::PUT('client/update/{client}','ClientController@update')->name('client_info_update');
        Route::Delete('client/delete/{client}','ClientController@destroy')->name('client_info_destroy');
        Route::get('client/settings','ClientController@settings')->name('client_settings');
        Route::post('client/settings/store','ClientController@settings_store')->name('client_settings_store');
        Route::put('client/deactive/{clientsettings}','ClientController@deActive')->name('client_settings_deactive');
        Route::put('client/active/{clientsettings}','ClientController@Active')->name('client_settings_active');
        Route::get('client/settingsedit/{clientsettings}','ClientController@SettingsEdit')->name('client_settings_edit');
        Route::put('client/settingUpdate/{clientsettings}','ClientController@SettingsUpdate')->name('client_settings_update');

        /**
         *  supplier part 
         */
        Route::get('supplier/info/index','SupplierController@index')->name('supplier_list');
        Route::get('supplier/info/create','SupplierController@create')->name('supplier_create');
        Route::post('supplier/info/store','SupplierController@store')->name('supplier_store');
        Route::get('supplier/info/edit/{id}','SupplierController@EditSupplier')->name('supplier_edit');
        Route::post('supplier/info/update/{id}','SupplierController@UpdateSupplier')->name('supplier_update');
        Route::get('supplier/info/view/{id}','SupplierController@ViewSupplier')->name('supplier_view');
        Route::get('supplier/info/delete/{id}','SupplierController@DeleteSupplier')->name('supplier_delete');
  });



   /**
         *  Product part Start here 
            =>  Controller Product/ProductController 
            17.07.19
         */


Route::get('product/info/index','Product\ProductController@ProductIndex')->name('index.products');
Route::get('product/info/create','Product\ProductController@ProductCreate')->name('create.products');
Route::post('product/info/store','Product\ProductController@ProductStore')->name('product.store');
Route::get('product/info/edit/{id}','Product\ProductController@EditProduct')->name('product.edit');
Route::post('product/updates/{id}','Product\ProductController@UpdateProduct')->name('update.product');
Route::get('product/info/view/{id}','Product\ProductController@ViewProduct')->name('product.view');
Route::get('product/info/delete/{id}','Product\ProductController@DeleteProduct')->name('product.delete');


//Product Setting Part Start Here for model  

Route::get('product/setting/index','Product\ProductController@IndexProudctSetting')->name('product.setting.index');

Route::get('product/setting/create','Product\ProductController@CreateProudctSetting')->name('product.setting.create');
Route::post('product/setting/store','Product\ProductController@StoreProudctSetting')->name('product.setting.store');

Route::get('product/setting/edit/{id}','Product\ProductController@EditProudctSetting')->name('product.setting.edit');


Route::post('product/setting/update/{id}','Product\ProductController@UpdateProudctSetting')->name('product.setting.update');

Route::get('product/setting/delete/{id}','Product\ProductController@DeleteProudctSetting')->name('product.setting.delete');

//Product Setting Part Start Here for model  


Route::get('product/setting/brand','Product\ProductController@IndexBrand')->name('product.brand.index');

Route::get('product/setting/brand/create','Product\ProductController@CreateBrand')->name('product.brand.create');

Route::post('product/setting/brand/store','Product\ProductController@StoreBrand')->name('product.brand.store');

Route::get('product/setting/brand/edit/{id}','Product\ProductController@EditBrand')->name('product.brand.edit');

Route::post('product/setting/brand/update/{id}','Product\ProductController@UpdateBrand')->name('product.brand.update');
Route::get('product/setting/brand/delete/{id}','Product\ProductController@DeleteBrand')->name('product.brand.delete');

/* Product part End here */


      /* Stock view start from here 

       =>'Controller ' Stock\StockController
       =>'view',  'Stock\'
       =>'model '=>'Stockproduct'

      */

Route::get('stock/product','Stock\StockController@index')->name('index.stock.product');
Route::get('stock/product/create','Stock\StockController@create')->name('stock.product.create');
Route::post('stock/product/store','Stock\StockController@store')->name('stock.product.Store');
Route::get('stock/product/edit/{id}','Stock\StockController@edit')->name('stock.product.edit');
Route::post('stock/product/update/{id}','Stock\StockController@update')->name('stock.product.update');
Route::get('stock/product/delete/{id}','Stock\StockController@delete')->name('stock.product.delete');
Route::get('stock/product/reports','Stock\StockController@stockreports')->name('stock.product.reports');



/*  stock part  End here */





  /* Sell  view start from here 
     
      'Controller ' => sell/SellController'
      'view',       => 'sell\'
      'model '      =>'Productsell'

      21.07.19

      */


Route::get('sell/product/create','sell\SellController@create')->name('sells.product.create');
Route::get('sell/product/price/{id}','sell\SellController@ProductPrice')->name('sells.product.price');


Route::post('sell/product/add/cart','sell\SellController@CartProducts')->name('sells.product.cart');


Route::post('sell/product/store','sell\SellController@StoreSellProducts')->name('sells.product.store');







