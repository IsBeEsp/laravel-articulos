<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactoController;
use App\Models\Article;
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

Route::get('/', function () {
    $articulos = Article::with('user')->where('stock', '!=', 0)->paginate(15);
    return view('welcome', compact('articulos'));
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () { 
        $articulos = Article::with('user')->where('user_id', auth()->user()->id)->paginate(15);
        return view('dashboard', compact('articulos'));
    })->name('dashboard');

    Route::resource('article', ArticleController::class);

    // Contact.
    Route::get('contacto', [ContactoController::class, 'pintarFormulario'])->name('contacto.pintar');
    Route::post('contacto', [ContactoController::class, 'procesarFormulario'])->name('contacto.procesar');
});