<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('index', [RecordController::class, 'index']);

Route::get('add', [RecordController::class, 'add']);
Route::post('add', [RecordController::class, 'create']);

Route::post('done', [RecordController::class, 'update']);

// Route::get('index', function () {
//     return view('workrecords/index');
// });
