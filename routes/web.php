<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MuseumController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ThumbnailController;
use App\Http\Controllers\AboutCategoryController;
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

Route::get('/', HomePageController::class)->name('home');

Route::get('/about/{category}', [AboutCategoryController::class,'show'])->name('about.category.index');

Route::get('/about/{category}/articles', [AboutController::class,'index'])->name('about.article.index');

Route::get('/about/{category}/articles/{about}', [AboutController::class,'show'])->name('about.article.show');

Route::get('/posts', [PostController::class,'index'])->name('posts');

Route::get('/posts/{post}', [PostController::class,'show'])->name('post.show');

Route::get('/places', [PlaceController::class,'index'])->name('places');

Route::get('/places/{place}', [PlaceController::class,'show'])->name('place.show');

Route::get('/museum', [MuseumController::class,'index'])->name('museums');

Route::get('/museum/{museum}', [MuseumController::class,'show'])->name('museum.show');

Route::get('/media/audios', [AudioController::class,'index'])->name('media.audios.index');

Route::get('/media/audios/{audio}', [AudioController::class,'show'])->name('media.audios.show');

Route::get('/media/videos', [VideoController::class,'index'])->name('media.videos.index');

Route::get('/media/videos/{video}', [VideoController::class,'show'])->name('media.videos.show');

Route::get('/printed-productions', [PrintedProductionController::class,'index'])->name('printed-productions.index');

Route::get('/printed-productions/{product}', [PrintedProductionController::class,'show'])->name('printed-productions.show');

Route::get('/contact', [SettingController::class, 'contactIndex'])->name('contact.index');

Route::post('/contact/send-message', [SettingController::class, 'sendForm'])->name('sendContactForm');

Route::get('/policy', [SettingController::class, 'policyIndex'])->name('policy.index');

Route::get('/storage/images/{dir}/{method}/{year}/{month}/{day}/{size}/{file}',ThumbnailController::class)
            ->where('method','resize|crop|fit')
            ->where('year','\d{4}$')
            ->where('month','\d{2}$')
            ->where('day','\d{2}$')
            ->where('size','(\d+|null)x(\d+|null)')
            ->where('file','.+\.(png|jpg|gif|bmp|svg|jpeg)$')
            ->name('thumbnail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
