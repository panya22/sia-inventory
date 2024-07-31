<?php

use App\Http\Controllers\BorrowedItemController;
use App\Http\Controllers\ItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
use App\Models\roomInventory;
use App\Http\Controllers\BorrowingItemsController;
use App\Http\Controllers\DamageItemController;
use App\Http\Controllers\DashboardController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rooms
// Route::get('rooms', [RoomsController::class, 'displayRooms']);
// Route::get('rooms/{id}', [RoomsController::class, 'displaySingleRooms']);
// Route::post('rooms/add', [RoomsController::class, 'addrooms']);
// Route::post('rooms/update/{id}', [RoomsController::class, 'updateRooms']);
// Route::post('rooms/delete/{id}', [RoomsController::class, 'deleteRooms']);


// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);


//Items
Route::get('items', [ItemsController::class, 'displayItems']);
Route::post('items/add', [ItemsController::class, 'addItems']);
Route::post('items/update/{id}', [ItemsController::class, 'updateItems']);
Route::post('items/delete/{id}', [ItemsController::class, 'deleteItems']);


Route::get('/borrowed-items', [BorrowedItemController::class, 'index']);
    Route::post('/borrowed-items', [BorrowedItemController::class, 'store']);
    Route::get('/total-borrowed-quantity-per-item', [BorrowedItemController::class, 'totalBorrowedQuantityPerItem']);
    Route::post('/borrowed-items/return', [BorrowedItemController::class, 'returnItem']);
    Route::get('/total-overdue-quantities-per-item', [BorrowedItemController::class, 'totalOverdueQuantitiesPerItem']);


    Route::get('/damaged-items', [DamageItemController::class, 'index']);
    Route::get('/total-damage-quantity-per-item', [DamageItemController::class, 'totalDamagedQuantitiesPerItem']);
    Route::post('/damaged-items', [BorrowedItemController::class, 'markAsDamaged']);
    Route::post('/damaged-items/repair', [DamageItemController::class, 'repairItem']);

    // Route::get('/profile', [ProfileController::class, 'edit']);
    // Route::patch('/profile', [ProfileController::class, 'update']);
    // Route::delete('/profile', [ProfileController::class, 'destroy']);
