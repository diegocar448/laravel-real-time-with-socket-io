<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/create-post', function () {
    $user = User::first();

    $user->posts()->create([
        'title' => Str::random(150),
        'body' => Str::random(400),
    ]);

    //event(new PostCreated($post));

    return 'ok';
});

Route::get('/', [SiteController::class, 'index']);
