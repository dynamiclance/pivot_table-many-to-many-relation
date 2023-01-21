<?php

use App\Models\User;
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

    // $user = User::with('roles')->find(1);

    $roles = User::find(1)->roles()->orderBy('name')->get();
    return $roles;

    // return $user;
    return view('welcome', compact('user'));
});
