<?php

use App\Http\Controllers\PhoneNumbers;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']); // route to homepage
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // route to homepage

Route::group([
    'middleware' => ['auth', 'verified']
], function () {

    // Each path must be authenticated
    Route::group([
        'prefix' => 'employee',
        'middleware' => 'employee',
    ], function () {
        
        Route::get('/', [App\Http\Controllers\SessionEmployeeController::class, 'index'])->name('new'); // Employee start interface
        Route::get('/sessions', [App\Http\Controllers\SessionEmployeeController::class, 'sessions']); // Get all employee sessions
        Route::get('/get-sessions', [App\Http\Controllers\SessionEmployeeController::class, 'get_sessions']); // Get all employee sessions

        Route::get('/get_session_info', [App\Http\Controllers\SessionEmployeeController::class, 'get_session_info']); // Get specific session information for the current employee
        Route::get('/export-data', [App\Http\Controllers\GeneratFiles::class, 'index']); // File export interface
        Route::get('/appointment', [App\Http\Controllers\SessionEmployeeController::class, 'appointment']); // Appointment review interface
        Route::get('/phone-numbers', [App\Http\Controllers\SessionEmployeeController::class, 'phone_numbers']); // Interface to review the mobile numbers of the current employee
        Route::post('/save_session_info', [App\Http\Controllers\SessionEmployeeController::class, 'save_session_info']); // Saving data


        Route::group([
            'prefix' => 'phone'
        ], function () {
            
            Route::get('/get-number', [App\Http\Controllers\PhoneNumbers::class, 'get_random_number']); // get random phone number from database where his status is idle
            Route::get('/get-status-number', [App\Http\Controllers\PhoneNumbers::class, 'get_status_number']); // change phone number status to 'out of service'
            Route::post('/set-status-number', [App\Http\Controllers\PhoneNumbers::class, 'set_status_number']); // change phone number status to 'out of service'
            Route::post('/idle', [App\Http\Controllers\PhoneNumbers::class, 'idle']); // change phone number status to busy
            Route::post('/in-process', [App\Http\Controllers\PhoneNumbers::class, 'in_process']); // change phone number status to busy

            Route::post('/new', [App\Http\Controllers\EmployeePhoneNumbersController::class, 'add_new_number']); // add new number to database
            Route::post('/reject', [App\Http\Controllers\EmployeePhoneNumbersController::class, 'reject']); // change phone number status to reject
            Route::post('/busy', [App\Http\Controllers\EmployeePhoneNumbersController::class, 'busy']); // change phone number status to busy
            Route::post('/out-of-service', [App\Http\Controllers\EmployeePhoneNumbersController::class, 'out_of_service']); // change phone number status to 'out of service'
            Route::get('/check-if-number-exsits', [App\Http\Controllers\EmployeePhoneNumbersController::class, 'check_if_number_exsits']); // change phone number status to 'out of service'
            
        });


        Route::group([
            'prefix' => 'export',
        ], function () {
            Route::get('/client', [App\Http\Controllers\GeneratFiles::class, 'client']); // Export data for a single customer
            Route::get('/all-clients', [App\Http\Controllers\GeneratFiles::class, 'all_clients']); // Export data for a multi customers
            Route::get('/appointment', [App\Http\Controllers\GeneratFiles::class, 'appointment']); // Export data for a single appointment
            Route::get('/all-appointments', [App\Http\Controllers\GeneratFiles::class, 'all_appointments']); // Export data for a multi appointments
            Route::get('/session', [App\Http\Controllers\GeneratFiles::class, 'session']); // Export data for a single session
            Route::get('/all-sessions', [App\Http\Controllers\GeneratFiles::class, 'all_sessions']); // Export data for a multi sessions
            Route::get('/phone', [App\Http\Controllers\GeneratFiles::class, 'phone']); // Export data for a single phone
            Route::get('/all-phones', [App\Http\Controllers\GeneratFiles::class, 'all_phones']); // Export data for a multi phones

        });
    });

    Route::group([
        'prefix' => 'admin',
        'middleware' => 'admin'
    ],function(){
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index']); // Employee start interface
        Route::get('/start', [App\Http\Controllers\AdminController::class, 'index']); // Employee start interface
        Route::get('/appointments', [App\Http\Controllers\AdminController::class, 'appointments_view']); // Employee start interface
        Route::get('/numbers', [App\Http\Controllers\AdminController::class, 'numbers_view']); // Employee start interface
        Route::get('/clients', [App\Http\Controllers\AdminController::class, 'clients_view']); // Employee start interface
        Route::get('/sessions', [App\Http\Controllers\AdminController::class, 'sessions_view']); // Employee start interface
        Route::get('/employees', [App\Http\Controllers\AdminController::class, 'employees_view']); // Employee start interface
        
        
        Route::get('/get-all-clients', [App\Http\Controllers\ClientController::class, 'get_clients']);
        Route::get('/get-all-numbers', [App\Http\Controllers\EmployeePhoneNumbersController::class, 'get_numbers']);
        Route::get('/get-all-employees', [App\Http\Controllers\EmployeesController::class, 'get_employees']);
        Route::get('/get-all-sessions', [App\Http\Controllers\SessionsController::class, 'get_sessions']);
    });

});


Route::get('/generate-phones-numbers', [PhoneNumbers::class, 'generate_phone_numbers_for_database']);




Route::get('/ee',function(){ 

    // return Employee::get();

    // return DB::table('employee')->where('id' ,'=' ,1)->update([
    //     'email_verified_at'=>'2023-05-24 12:00:00pm'
    // ]);

    
});