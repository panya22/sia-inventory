<?php

use App\Http\Controllers\ItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;
use App\Models\roomInventory;

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

// Route::post('/auth/register', [AdminController::class, 'createUser']);
// Route::post('/auth/login', [AdminController::class, 'loginUser']);

// { pang rooms
// pang dispaly ng rooms
Route::get('rooms', [RoomsController::class, 'displayRooms']);
// pang dispaly ng single room
Route::get('rooms/{id}', [RoomsController::class, 'displaySingleRooms']);
// pang add ng rooms
Route::post('rooms/add', [RoomsController::class, 'addrooms']);
// pang update ng room
Route::post('rooms/update/{id}', [RoomsController::class, 'updateRooms']);
// pang delete rooms 
Route::post('rooms/delete/{id}', [RoomsController::class, 'deleteRooms']);


// pang items
Route::get('items', [ItemsController::class, 'displayItems']);
Route::post('items/add', [ItemsController::class, 'addItems']);
Route::post('items/update/{id}', [ItemsController::class, 'updateItems']);
Route::post('items/delete/{id}', [ItemsController::class, 'deleteItems']);


// pang distribute ng items
Route::get('/rooms/{roomId}/inventory', [roomInventory::class, 'showRoomInventory']);
Route::post('/rooms/{roomId}/inventory/add', [roomInventory::class, 'addItemToRoom']);
Route::get('/items/available', [ItemsController::class, 'getAvailableItems']);
