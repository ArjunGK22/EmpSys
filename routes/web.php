<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EmployeeUpdateController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => ['customauth']], function () {
    // Login Routes 
    Route::get('login', [SessionController::class, 'viewLogin']);
    Route::post('login', [SessionController::class, 'login']);
    Route::get('logout', [SessionController::class, 'logout']);

    // Admin Routes
    Route::view('/adminDashboard', 'admin/dashboard')->middleware('admin');

    Route::post('importUsers', [ExcelController::class, 'saveExcel'])->middleware('admin');
    Route::get('exportUsers', [ExcelController::class, 'exportExcel'])->middleware('admin');
    Route::get('importUsers', [ExcelController::class, 'viewimportUser'])->middleware('admin');

    Route::view('addemp', 'admin/addemployee')->middleware('admin');

    Route::post('createEmployee', [AdminController::class, 'create'])->middleware('admin');
    Route::get('update/{id}', [AdminController::class, 'fetchDetails'])->middleware('admin');
    Route::post('update', [AdminController::class, 'updateEmployee'])->middleware('admin');


    Route::get('/delete_employee/{id}', [AdminController::class, 'deleteEmployee'])->middleware('admin');

    Route::get('view', [AdminController::class, 'fetch'])->middleware('admin');

    // User Routes
    Route::group(['middleware' => ['userauth']], function () {
        Route::get('profile', [UserProfileController::class, 'showProfile']);
        Route::get('edit', [UserProfileController::class, 'edit']);
        Route::post('/udpate_employee', [UserProfileController::class, 'update']);
    });

    //Delete Individual

    Route::post('/deleteEducation/{id}', [DeleteController::class, 'deleteEducation']);
    Route::post('/deleteExperience/{id}', [DeleteController::class, 'deleteExperience']);
    Route::post('/deleteFamily/{id}', [DeleteController::class, 'deleteFamily']);

    // app/Http/routes.php | app/routes/web.php

    Route::get('/pdf/{id}', [PdfController::class, 'generateBioData1']); //pdf download

});

