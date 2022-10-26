<?php

use App\Actions\User\ProcessUserForm;
use App\Actions\User\ShowUserForm;
use App\Actions\User\ViewAllUsers;
use App\Actions\User\ViewUserDetails;
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

Route::group([
    'prefix' => '/'
], function () {
    //Route::get('user-form', ShowUserForm::class)->name('user.create');
    Route::post('create-user', ProcessUserForm::class)->name('user.store');

    Route::get('view-user-details/{id}', ViewUserDetails::class)->name('user.show');
    Route::get('user-lists', ViewAllUsers::class)->name('user.index');
});
