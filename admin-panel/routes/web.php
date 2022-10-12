<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ResourceController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('usermanagers', UserManagerController::class);
Route::post('delete-usermanager', [UserManagerController::class,'destroy']);

Route::resource('banners', BannerController::class);
Route::post('delete-banner', [BannerController::class,'destroy']);

Route::resource('contacts', ContactController::class);
Route::post('delete-contact', [ContactController::class,'destroy']);

Route::resource('faqs', FaqController::class);
Route::post('delete-faq', [FaqController::class,'destroy']);

Route::resource('pages', PageController::class);
Route::post('delete-page', [PageController::class,'destroy']);

Route::resource('industries', IndustryController::class);
Route::post('delete-industry', [IndustryController::class,'destroy']);

Route::resource('technologies', TechnologyController::class);
Route::post('delete-technology', [TechnologyController::class,'destroy']);

Route::resource('frameworks', FrameworkController::class);
Route::post('delete-framework', [FrameworkController::class,'destroy']);

Route::resource('portfolios', PortfolioController::class);
Route::post('delete-portfolio', [PortfolioController::class,'destroy']);

Route::resource('departments', DepartmentController::class);
Route::post('delete-department', [DepartmentController::class,'destroy']);

Route::resource('roles', RoleController::class);
Route::post('delete-role', [RoleController::class,'destroy']);

Route::resource('teams', TeamController::class);
Route::post('delete-team', [TeamController::class,'destroy']);

Route::resource('resources', ResourceController::class);
Route::post('delete-resource', [ResourceController::class,'destroy']);

// Route::get('home','UserManagerController@totalusers')->name('userCount');

Route::get('layouts.dashboard', [UserManagerController::class, 'userCount']);
//Route::get('resources/create', [ResourceController::class, 'data']);
