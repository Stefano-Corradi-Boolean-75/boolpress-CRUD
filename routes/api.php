<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('prova', function(){

    $success = true;
    $user = [
        'name' => 'Ugo',
        'lastname' => 'De Ughi'
    ];
    return response()->json(compact('success','user'));
});

Route::namespace('Api')
    ->prefix('posts')
    ->group(function(){
        Route::get('/',[PostController::class, 'index']);

    });




