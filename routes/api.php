<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\StyleController;
use App\Http\Controllers\Api\BuyerController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

//--Guard API--
Route::middleware('auth:api')->get('test/user', function() {
    return response()->json(['user' => auth()->user()]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/buyers/update/{id}",[BuyerController::class,"updateBuyer"]);

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResources([
        'products' => ProductController::class,
        'sizes'=>SizeController::class,
        'styles'=>StyleController::class,
        'buyers'=>BuyerController::class,
        'status'=>StatusController::class,
        'orders'=>OrderController::class,
        'upimages'=>ImageController::class,
        'orderdetails'=>OrderDetailsController::class,
    ]);
});

// Route::apiResources([
//     'users' => UserController::class,
//     'products' => ProductController::class,
//     //'categories' => CategoryController::class,
//     // 'customers' => CustomerController::class,
//     //'uoms'=>UoMController::class,
//     //'manufacturers'=>ManufacturerController::class,
//     //'sections'=>SectionController::class
//     'sizes'=>SizeController::class,
//     'styles'=>StyleController::class,
//     'buyers'=>BuyerController::class,
//     'status'=>StatusController::class,
//     'orders'=>OrderController::class,
//     'upimages'=>ImageController::class,
//     'orderdetails'=>OrderDetailsController::class,
// ]);