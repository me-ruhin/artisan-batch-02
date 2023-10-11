<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/v1/test',function(){


   return response()->json();

});


Route::group(['prefix'=>"/v1"],function(){


    Route::post('/users',function(Request $request){
        
        $user = \App\Models\User::get($request->all());

        return $user;
    });


    Route::get('/users',function(Request $request){
        
        $users = \App\Models\User::with('posts')->get();
        // return response()->json($users);
        return UserResource::collection($users);
    });

});


// HMVC == 