<?php

use App\Http\Controllers\dashboard\BlogsController;
use App\Http\Controllers\dashboard\ContactsController;
use App\Http\Controllers\dashboard\PagesController;
use App\Http\Controllers\dashboard\ProductsConttoller;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\dashboard\SettingsConttoller;
use App\Http\Controllers\dashboard\SlidesController;
use App\Http\Controllers\dashboard\StateController;
use App\Http\Controllers\PagesController as ControllersPagesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ControllersPagesController::class ,'index'])->name('index');
Route::get('quem-somos', [ControllersPagesController::class ,'about'])->name('about');
Route::get('fale-conosco', [ControllersPagesController::class ,'contacts'])->name('contacts');
Route::post('send-conosco', [ControllersPagesController::class ,'sendContacts'])->name('contact');
Route::post('newslleter', [ControllersPagesController::class ,'newslleter'])->name('newslleter');
Route::get('blog', [ControllersPagesController::class ,'blogs'])->name('blogs');
Route::get('blog/{slug}', [ControllersPagesController::class ,'blog'])->name('blog');
Route::get('produtos/{slug}', [ControllersPagesController::class,'products'])->name('products');
Route::get('produto/seach', [ControllersPagesController::class,'search'])->name('search');
Route::get('produto/{slug}', [ControllersPagesController::class,'product'])->name('product');

Auth::routes(['register' => false]);
Route::get('/m3', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'm3' ,'as' => 'm3.','middleware' => 'auth'], function () {
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile-update');
	Route::put('profile/password', [ProfileController::class, 'password'])->name('profile-password');

	Route::get('citys/{id}',[StateController::class, 'citys'])->name('citys');
	Route::get('districts/{id}',[StateController::class, 'districts'])->name('districts');

	Route::resource('slides', SlidesController::class);
	Route::resource('blog', BlogsController::class);
	Route::resource('pages', PagesController::class);
	Route::resource('settings', SettingsConttoller::class);
	Route::resource('products', ProductsConttoller::class);
	Route::resource('contacts', ContactsController::class);

	Route::get('products/{product}/galeria',[ProductsConttoller::class, 'Productsgaleria'])->name('Productsgaleria');
	Route::post('products-galeria',[ProductsConttoller::class, 'gallery'])->name('galeria');
	Route::delete('products-galeria-delete/{id}',[ProductsConttoller::class, 'deletegallery'])->name('deletegallery');
});

