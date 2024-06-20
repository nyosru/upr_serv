<?php

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('config', [\App\Http\Controllers\StarterController::class, 'index'])
    ->middleware(['auth'])
    ->name('config');

Route::get('config2', \App\Livewire\Upr\ConfigCaddyfile::class)
    ->middleware(['auth'])
    ->name('config2');

Route::group(
    [
        'as' => 'docker.',
'prefix' => 'docker',
    'middleware' => 'auth',
//        'domain' => (env('APP_ENV', 'x') == 'local') ? 'vk.files.php-cat.local' : 'vk.files.php-cat.com'
    ], function () {
    Route::get('', \App\Livewire\Upr\Docker\Index::class)
//        ->middleware(['auth'])
        ->name('index');

    Route::get('add', \App\Livewire\Upr\Docker\Add::class)
//        ->middleware(['auth'])
        ->name('add');
});

require __DIR__ . '/auth.php';
