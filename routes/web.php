<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\BoardDirectorController;

use App\Models\Employee;
use App\Models\Division;
use App\Models\BoardDirector;

/*
|--------------------------------------------------------------------------
| WELCOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [LoginController::class, 'showLogin']
)->name('login');

Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('login.post');

Route::post(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $employees = Employee::latest()->get();

        $totalEmployees = Employee::count();

        $totalDivisions = Division::count();

        $totalBoardDirectors = BoardDirector::count();

        return view(
            'dashboard',
            compact(
                'employees',
                'totalEmployees',
                'totalDivisions',
                'totalBoardDirectors'
            )
        );

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | EMPLOYEES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'employees',
        EmployeeController::class
    );

    /*
    |--------------------------------------------------------------------------
    | EMPLOYEE EXPORTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/employees/export/excel',
        [EmployeeController::class, 'exportExcel']
    )->name('employees.export.excel');

    Route::get(
        '/employees/export/csv',
        [EmployeeController::class, 'exportCSV']
    )->name('employees.export.csv');

    Route::get(
        '/employees/export/pdf',
        [EmployeeController::class, 'exportPDF']
    )->name('employees.export.pdf');

    /*
    |--------------------------------------------------------------------------
    | BOARD DIRECTORS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'board-directors',
        BoardDirectorController::class
    );

});