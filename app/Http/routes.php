<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', function () {
    return view('login');
});

Route::post('login', ['as' => 'login', 'uses' => function(){
    //auth user
    Auth::attempt(['username' => Request::input('username'), 'password' => Request::input('password')]);

    if (Request::ajax()) {
        if (Auth::check()) {
            return "true";
        } else {
            return "false";
        }
    } else {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return redirect('login');
        }
    }
}]);
// Route::post('login', function() {
//     //auth user
//     Auth::attempt(['username' => Request::input('username'), 'password' => Request::input('password')]);

//     if (Request::ajax()) {
//         if (Auth::check()) {
//             return "true";
//         } else {
//             return "false";
//         }
//     } else {
//         if (Auth::check()) {
//             return redirect('home');
//         } else {
//             return redirect('login');
//         }
//     }
// });

// Logout
Route::get('logout', function() {
    Auth::logout();
    return redirect('login');
});

// Update sidebar position
Route::get('sidebar-update', function() {
    $value = \DB::table('appsetting')->whereName('sidebar_collapse')->first()->value;
    \DB::table('appsetting')->whereName('sidebar_collapse')->update(['value' => $value == 1 ? '0' : '1']);
});

// Register Route
Route::group(['middleware' => ['web']], function () {
    // Registrasi TKI
    Route::get('reg-tki','RegistrasiController@regTki');
    Route::post('save-reg-tki','RegistrasiController@saveRegTki');

    // Registrasi Agency
    Route::get('reg-agency','RegistrasiController@regAgency');
    Route::post('save-reg-agency','RegistrasiController@saveRegAgency');
});



Route::group(['middleware' => ['web','auth']], function () {
    // HOME CONTROLLER
    Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

});

Route::group(['middleware' => ['web','auth','isadmin']], function () {
    

    // Administrasi Group
    Route::group(['prefix' => 'admin'], function () {
        // User Controller
        Route::get('user', ['as' => 'admin.user', 'uses' => 'UserController@index']);
        Route::get('user/add', ['as' => 'admin.user.add', 'uses' => 'UserController@add']);
        Route::post('user/insert', ['as' => 'admin.user.insert', 'uses' => 'UserController@insert']);
        Route::get('user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
        Route::post('user/update-user', ['as' => 'admin.user.update-user', 'uses' => 'UserController@updateUser']);    
        Route::get('user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UserController@delete']);

        // Agency Controller
        Route::get('agency', ['as' => 'admin.agency', 'uses' => 'AgencyController@index']);
        Route::get('agency/add', ['as' => 'admin.agency.add', 'uses' => 'AgencyController@add']);
        Route::post('agency/insert', ['as' => 'admin.agency.insert', 'uses' => 'AgencyController@insert']);
        Route::get('agency/edit/{id}', ['as' => 'admin.agency.edit', 'uses' => 'AgencyController@edit']);
        Route::post('agency/update', ['as' => 'admin.agency.update', 'uses' => 'AgencyController@update']);    
        Route::get('agency/delete/{id}', ['as' => 'admin.agency.delete', 'uses' => 'AgencyController@delete']);

        // Ctki Controller
        Route::get('ctki', ['as' => 'admin.ctki', 'uses' => 'CtkiController@index']);
        Route::get('ctki/add', ['as' => 'admin.ctki.add', 'uses' => 'CtkiController@add']);
        Route::post('ctki/insert', ['as' => 'admin.ctki.insert', 'uses' => 'CtkiController@insert']);
        Route::get('ctki/edit/{id}', ['as' => 'admin.ctki.edit', 'uses' => 'CtkiController@edit']);
        Route::post('ctki/update', ['as' => 'admin.ctki.update', 'uses' => 'CtkiController@update']);    
        Route::get('ctki/delete/{id}', ['as' => 'admin.ctki.delete', 'uses' => 'CtkiController@delete']);
        Route::post('ctki/promote', ['as' => 'admin.ctki.promote', 'uses' => 'CtkiController@promote']);

    });
});

Route::group(['middleware' => ['web','auth','isagency']], function () {    

    // Agency Group`
    Route::group(['prefix' => 'agency'], function () {
        Route::get('profile','AgencyController@profile');
        Route::get('ctki','AgencyController@promotedCtki');
        Route::get('show-ctki/{id}','AgencyController@showCtki');
        Route::get('recruit/{id}','AgencyController@recruit');
        Route::get('refuse/{id}','AgencyController@refuse');
        Route::get('recruited','AgencyController@recruited');
        Route::post('profile-update','AgencyController@profileUpdate');
    });

});

Route::group(['middleware' => ['web','auth','isctki']], function () {    
    // Agency Group`
    Route::group(['prefix' => 'ctki'], function () {
        Route::get('profile','CtkiController@profile');
        Route::post('profile-update','CtkiController@profileUpdate');
    });

});

