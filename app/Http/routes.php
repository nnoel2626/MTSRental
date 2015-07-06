<?php 

Route::get('/', 'WelcomeController@index');

    Route::get('/classes', function() {
    echo Paste\Pre::render(get_declared_classes(),'');
     });
                              

Route::get('/', 'HomeController@index');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',    
]);

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

//-------------------------equipment route------------------------////
    // Route::model('equipment', 'Equipment');

    Route::group( array('prefix' => 'admin' ), function () {

       
    Route::get('equipment/index',[
            'as' => 'admin.equipment.index', 
            'uses'=>'EquipmentController@index'
        ]);
    Route::resource('equipment', 'EquipmentController',[
             'only'=>[ 'create','store', 'show',
             'edit', 'update', 'destroy']
        ]);
    Route::get('/equipment.search_form', 'EquipmentController@getSearch');
    Route::post('/equipment.search_result', 'EquipmentController@postSearch'); 

    //----------------------------Category route------------------------////
    Route::get('categories/index', [
            'as' => 'admin.categories.index', 
            'uses'=>'CategoriesController@index'
        ]);
    Route::resource('categories', 'CategoriesController', [         
     'only'=>['index','create','store', 'show',
             'edit', 'update', 'destroy']
    ]); 

    Route::get('users/index', [
            'as' => 'admin.users.index', 
            'uses'=>'UserController@index'
        ]);
    Route::resource( 'users', 'UserController',[
            'only'=>[ 'create','show','edit', 'update', 'destroy']
        ]);  
});


    //-------------------------------- Rental route------------------------////
    //Route::model('rental', 'Rental');
    Route::get('/rental/index', ['as' => 'rental.index', 
        'uses' =>'RentalController@index']);


Route::get('/rental/getCategory/{cat}', ['as' => 'rental.category', 
        'uses' => 'RentalController@getCategory']);
         
 Route::get('/rental/view/{id}', ['as' => 'rental.view', 
        'uses' => 'RentalController@getView']); 

    Route::get('/rental/show/{id}', ['as' => 'rental.show', 
        'uses' => 'RentalController@show']);  

    Route::get('rental/rentEquipment',['as' => 'rental.rentEquipment', 
        'uses' =>'RentalController@getRentEquipment'
        ]);

    Route::get('rental/search', ['as' => 'rental.search', 
        'uses' => 'RentalController@getSearch'
        ]); 

    
  
////-------------------------------- Cart route------------------------////

        Route::get('/cart.cart', [ 
            'as' => 'cart',
             'uses' => 'CartController@getCart'
            ]); 

        Route::post('/cart.add', [
            'as' => 'cart.add',
             'uses' => 'CartController@postAddToCart'
           ]); 

        Route::post('/cart.show', [
            'as' => 'cart.show',
             'uses' => 'CartController@showCart'
           ]);  

          Route::get('/cart.edit', [
            'as' => 'cart.edit',
             'uses' => 'CartController@editCart'

           ]);  


          Route::post('/cart.update', [
            'as' => 'cart.update',
             'uses' => 'CartController@updateCart'
           ]);  


//-------------------- order Routes---------------------------//
            
     // Route::resource('order', 'OrderController',   [
     //    'only'=>[ 'index', 'create','store', 'show',
     //         'edit', 'update', 'destroy']
     //        ]); 

     //         Route::get('/user/orders', [
     //        'before' => 'auth.basic',
     //        'uses' => 'OrderController@getIndex'
     //        ]);

     //        Route::post('/order', [
     //        'before' => 'auth.basic',
     //        'uses' => 'OrderController@postOrder'
     //        ]);

            
           
//-------------------------Roles route------------------------////
    // Route::model('role', 'Role');                     
    // route::resource('roles', 'RolesController',[
    //         'only'=>[ 'index', 'create','store', 
    //                 'edit', 'update', 'destroy']
    //     ]);

//-------------------------Permissions route------------------------////
    // Route::model('permission', 'Permission');
    // route::resource('permissions', 'PermissionsController',[
    //         'only'=>[ 'index', 'create','store',
    //          'edit', 'update', 'destroy']
    //     ]);
        
 // Route::get( '/index',[
    //         'as' => 'index', 
    //         'uses'=> 'AdminController@index' 
    //    // ]); 
