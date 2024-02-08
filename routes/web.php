<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, "index"])->name('home');

Route::get('/relation',[HomeController::class, "relate"])->name('relationship');

Route::prefix('todo')->group(function(){
    Route::get('/',[TodoController::class, "index"])->name("todo");
    Route::post('/store',[TodoController::class,"store"])->name('todo.store');
    Route::get('/{task_id}/delete',[TodoController::class, "delete"])->name('todo.delete');
    Route::get('/{task_id}/done',[TodoController::class, "done"])->name('todo.done');
    Route::post('/{task_id}/update',[TodoController::class,'update'])->name('todo.update');
    Route::get('/edit',[TodoController::class,'edit'])->name('todo.edit');
    Route::get('/{task_id}/sub',[TodoController::class,'sub'])->name('todo.sub');
    Route::post('/store/sub',[TodoController::class,'store_sub'])->name('todo.store.sub');
});


Route::prefix('banner')->group(function(){
    Route::get('/',[BannerController::class,'index'])->name('banner');
    Route::post('/store',[BannerController::class,"store"])->name('banner.store');
    Route::get('/{banner_id}/delete',[BannerController::class,'delete'])->name('banner.delete');
    Route::get('/{banner_id}/status',[BannerController::class,'status'])->name('banner.status');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
