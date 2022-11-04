<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PrintedProductionController;

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

Route::get('/', HomePageController::class);

Route::get('/about/{category}', [AboutController::class,'index']);

Route::get('/about/{category}/{about}', [AboutController::class,'show']);

Route::get('/posts', [PostController::class,'index']);

Route::get('/posts/{post}', [PostController::class,'show']);

Route::get('/places', [PlaceController::class,'index']);

Route::get('/places/{place}', [PlaceController::class,'show']);

Route::get('/archive/audios', [AudioController::class,'index']);

Route::get('/archive/audios/{audio}', [AudioController::class,'show']);

Route::get('/archive/printed-productions', [PrintedProductionController::class,'index']);

Route::get('/archive/printed-productions/{product}', [PrintedProductionController::class,'show']);

Route::get('/archive/videos', [VideoController::class,'index']);

Route::get('/archive/videos/{video}', [VideoController::class,'show']);

Route::get('/contact', [SettingController::class, 'contactIndex']);

Route::post('/contact/send-message', [SettingController::class, 'sendForm'])->name('sendContactForm');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
