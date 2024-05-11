<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\StyleCategoriesController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\StyleAttachmentController;
use App\Http\Controllers\RMCategoriesController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\FabricsController;
use App\Http\Controllers\TrimsController;
use App\Http\Controllers\StyleTrimsController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\StyleSizeController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\MeasurementSizeController;
use App\Http\Controllers\MeasurementAttachController;
use App\Http\Controllers\StyleMaterialQtyController;
use App\Http\Controllers\TechPacksController;

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

// Define routes that require authentication
Route::middleware(['auth'])->group(function () {
    route::resources([
        "users" => UserController::class,
        "roles" => RoleController::class,
        "products" => ProductController::class,
        "orders" => OrderController::class,
        "buyers" => BuyerController::class,
        "categories" => StyleCategoriesController::class,
        "styles" => StyleController::class,
        "styleattachments" => StyleAttachmentController::class,
        "rmcategories" => RMCategoriesController::class,
        "vendors" => VendorController::class,
        "uoms" => UomController::class,
        "rmaterials" => RawMaterialController::class,
        "fabrics" => FabricsController::class,
        "trims" => TrimsController::class,
        "sttrims" => StyleTrimsController::class,
        "sizes" => SizesController::class,
        "stsizes" => StyleSizeController::class,
        "measurements" => MeasurementController::class,
        "mtsizes" => MeasurementSizeController::class,
        "mtattachments" => MeasurementAttachController::class,
        "smquantities" => StyleMaterialQtyController::class,
        "techpacks" => TechPacksController::class,
    ]);
});

// Define login route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Define the authentication routes provided by Laravel
Auth::routes();