<?php


use App\Http\Controllers\NewsController;
use App\Http\Controllers\SitemapController;
use App\Models\News;
use App\Services\NewsDataService;
use App\Services\NewsService;
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

// Route::get('/', function () {
//     // News::get()->dd();
//     $query = array('country' => 'gb', "category" => 'food', "page" => 7);
//     $res = (new NewsDataService())->getLatestNews($query);
//     dd($res);
// });

// Admin Routes
require base_path() . '/routes/admin.php';

// sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');

Route::get('/search', [NewsController::class, 'search'])->name('search');

Route::get('/', [NewsController::class, 'index'])->name('homepage');
Route::get('/{category}', [NewsController::class, 'page'])->name('page');
Route::get('/{category}/{news}', [NewsController::class, 'show'])->name('news.show');
// Route::post('/search', [NewsController::class, 'search'])->name('search');
