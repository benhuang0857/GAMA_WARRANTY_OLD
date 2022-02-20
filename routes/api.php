<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-point', function (Request $request) {
    $email = $request->umail;
    try {
        $user = User::where('email', $email)->first();
        return $user->gama_point;
    } catch (\Throwable $th) {
        return "Null";
    }
});

Route::get('/send-point', function (Request $request) {
    $email = $request->umail;
    $point = $request->point;
    try {
        $user = User::where('email', $email)->first();
        $user->gama_point += $point;
        $user->save();
    } catch (\Throwable $th) {
        return "Null";
    }
});
