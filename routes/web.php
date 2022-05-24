<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\VideoHome;
use App\Http\Livewire\UserHome;
use App\Http\Livewire\Dashboard\DashboardComponent;
use App\Http\Livewire\Dashboard\VideoComponent;
use App\Http\Livewire\Dashboard\UserComponent;
use App\Http\Controllers\ActivateProject;

if (App::environment('production')) {
    URL::forceScheme('https');
}

// Activate Project
Route::get('/project/activate', [ActivateProject::class, 'activate'])->name('activate');

Route::get('/', Home::class)->name('/');
Route::get('/video/{videoId}', VideoHome::class)->name('video');
Route::get('/user/{userId}', UserHome::class)->name('user');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardComponent::class)->name('dashboard');
    Route::get('/video', VideoComponent::class)->name('dashboard.video');
});
