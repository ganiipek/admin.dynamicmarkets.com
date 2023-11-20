<?php

use Illuminate\Support\Facades\Route;

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






// Diğer oturum açma zorunluluğu olmayan rotalar...
Route::get('/400', function () {
    return view('page-error-400');
})->name('errors.page-error-400');
Route::get('/404', function () {
    return view('page-error-404');
})->name('errors.page-error-404');
Route::get('/403', function () {
    return view('page-error-403');
})->name('errors.page-error-403');

Route::get('/500', function () {
    return view('page-error-500');
})->name('errors.page-error-500');

Route::get('/503', function () {
    return view('page-error-503');
})->name('errors.page-error-503');


Route::get('/login', function () {
    $recaptcha_site_key_local = '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI';
    $recaptcha_site_key_production = '6Ld1tGUkAAAAAJG-5n1QOgORuL2JXJtcTdFEiPNp';
    
    $recaptcha_site_key = env('APP_ENV') == 'production' ? $recaptcha_site_key_production : $recaptcha_site_key_local;

    return view('auth.login', compact('recaptcha_site_key'));
})->name('auth.login');

Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/verify-device', function () {
    return view('auth.verify-device');
})->name('auth.verify-device');

Route::prefix('/auth')->group(function () {
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::post('/verify-device', 'App\Http\Controllers\AuthController@verifyDevice');
});

Route::group(['middleware' => ['accessToken']], function () {
    Route::prefix('/action')->group(function () {
        Route::prefix('/statistics')->group(function () {
            Route::get('/clients', 'App\Http\Controllers\StatisticsController@getClients');
            Route::get('/statistics', 'App\Http\Controllers\StatisticsController@getStatistics');
            Route::get('/registered_users', 'App\Http\Controllers\StatisticsController@getRegisteredUsers');
        });

        Route::prefix('/users')->group(function () {
            Route::post('/add', "App\Http\Controllers\UsersController@add");
            Route::put('/update', "App\Http\Controllers\UsersController@update");
            Route::get('/get_by_date', "App\Http\Controllers\UsersController@getAllByDate");
            Route::post('/client/bind', "App\Http\Controllers\UsersController@bindClient");
            Route::post('/client/unbind', "App\Http\Controllers\UsersController@unbindClient");
            Route::post('/verification', "App\Http\Controllers\UsersController@changeVerification");
        });

        Route::prefix('/metatrader')->group(function () {
            Route::get('group', 'App\Http\Controllers\MetatraderController@getGroups');

            Route::prefix('/clients')->group(function () {
                Route::get('list', 'App\Http\Controllers\MetatraderController@getClients');
                Route::post('add', 'App\Http\Controllers\MetatraderController@addClient');
            });

            Route::prefix('/trading_accounts')->group(function () {
                Route::post('add', 'App\Http\Controllers\MetatraderController@addTradingAccount');
            });

            Route::post('/swap', 'App\Http\Controllers\MetatraderController@setSwaps');
        });

        Route::prefix('/admins')->group(function () {
            Route::post('/add', 'App\Http\Controllers\AdminController@addAdmin');
            Route::delete('/delete', 'App\Http\Controllers\AdminController@deleteAdmin');

            Route::prefix('/settings')->group(function () {
                Route::post('/trading_account_default_group', "App\Http\Controllers\MetatraderController@setTradingAccountsDefaultGroup");
                Route::get('/user-trading-accounts-limit', "App\Http\Controllers\SettingsController@getUserTradingAccountsLimit");
                Route::post('/user-trading-accounts-limit', "App\Http\Controllers\SettingsController@setUserTradingAccountsLimit");
                Route::post('/mt5-custom-trading-account-id', "App\Http\Controllers\SettingsController@setMT5CustomTradingAccountId");
                Route::post('/sumsub-website-level', "App\Http\Controllers\SettingsController@setSumsubWebsiteLevel");
                Route::post('/sumsub-manuel-level', "App\Http\Controllers\SettingsController@setSumsubManuelLevel");
                
            });
        });

        Route::prefix('/withdrawals')->group(function () {
            Route::post('/update', "App\Http\Controllers\WithdrawalsController@setWithdrawalById");
        });
    });


    Route::prefix('/customers')->group(function () {
        Route::get('/create', function () {
            return view('customers.create');
        })->name('customers.create');
        
        Route::prefix('/metatrader')->group(function () {
            Route::get('list', 'App\Http\Controllers\ClientsController@initMetatraderListPage')->name('customers.metatrader.clients.list');
            
            Route::prefix('/clients')->group(function () {
                Route::get('add', 'App\Http\Controllers\MetatraderController@initAddClientPage')->name('customers.metatrader.clients.add');
            });

            Route::get('swaps', 'App\Http\Controllers\MetatraderController@initSwapsPage')->name('customers.metatrader.swaps');
        });
    });

    Route::prefix('/withdrawals')->group(function () {
        Route::get('/', 'App\Http\Controllers\WithdrawalsController@initWithdrawalsPage')->name("withdrawal.requests");
        Route::get('/detail', 'App\Http\Controllers\WithdrawalsController@initWithdrawalDetailPage')->name("withdrawal.detail");
    });

    Route::prefix('/admins')->group(function () {
        Route::get('/', 'App\Http\Controllers\AdminController@initAdminListPage')->name("admins.list");
    
        Route::get('/add', 'App\Http\Controllers\AdminController@initAdminAddPage')->name("admins.add");

        Route::get('/edit', 'App\Http\Controllers\AdminController@initAdminEditPage')->name("admins.edit");

        Route::get('/swaps', 'App\Http\Controllers\SwapsController@initSetSwapsPage')->name("admins.set_swaps");

        Route::prefix('/logger')->group(function () {
            Route::get('/http', 'App\Http\Controllers\LoggerController@initLoggerHTTPPage')->name("admins.logger.http");
            Route::get('/service', 'App\Http\Controllers\LoggerController@initLoggerServicePage')->name("admins.logger.service");
        });
        Route::get('/settings', 'App\Http\Controllers\AdminController@initSettingsPage')->name("admins.settings");
    });
    
    Route::get('/', 'App\Http\Controllers\StatisticsController@initStatisticsPage')->name("index");
    Route::get('/customers', 'App\Http\Controllers\ClientsController@initCustomerPage')->name("customers");

    Route::get('/user', 'App\Http\Controllers\ClientsController@initCustomerDetailPage')->name("user");
    

});