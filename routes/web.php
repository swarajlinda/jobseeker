<?php

use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Users\UserJobController;
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
    return view('Users.index');
});

// User Job controller
Route::controller(UserJobController::class)->group(function () {
    Route::get('users/job-list', 'jobList')->name('users.job.list');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->user_type == 'Admin')
            return view('Admin/dashboard');
        else
            return view('Users.index');
    })->name('dashboard');

    // Add New Job
    Route::controller(JobController::class)->group(function () {
        Route::get('crud/add-job-view', 'addJobView')->name('addjob.view');
        Route::post('crud/add-job', 'storeJob')->name('store.job');
        Route::get('crud/show-job/{id}', 'showJob');
        Route::post('crud/update-job', 'updateJob')->name('update.job');
    });

    // User Job controller
    Route::controller(UserJobController::class)->group(function () {
        Route::get('user/apply-job/{id}', 'applyJobView')->name('users.applyjob.view');
        Route::post('user/apply-job', 'applyJob')->name('users.applyjob');
    });
});
