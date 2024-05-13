<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function displayRooms(Request $request)
    {
        $rooms = rooms::all();
        return $rooms;
    }

    public function displaySingleRooms(Request $request)
    {
        $rooms = rooms::find($request->id);
        return $rooms;
    }
    // 
    // 
    public function addRooms(Request $request)
    {
        $request->validate([
            'rooms_num' => 'required',
        ]);
        $rooms = new rooms;
        $rooms->rooms_num = $request->rooms_num;
        $rooms->save();
        return response()->json(['message' => 'successful']);
    }
    // 
    // 
    public function updateRooms(Request $request, $id)
    {
        $rooms = rooms::findOrFail($id);

        $request->validate([
            'rooms_num' => 'required',
        ]);

        $rooms->update([
            'rooms_num' => $request->rooms_num
        ]);

        return response()->json(['message' => 'successful']);
    }

    public function deleteRooms(Request $request)
    {
        $rooms = rooms::findOrFail($request->id);
        $rooms->delete();
        return response()->json(['message' => 'successfull']);
    }

    // 
    // 
    // public function roomItems(Request $request)
    // {
    //     $room = rooms::findOrFail($request->id)->itemconn;
    //     return response()->json(['rooms_num' => $room]);
    // }
    // // 
    // // 
    // public function roomsItemsAdd(Request $request)
    // {
    //     $request->validate([
    //         'id' => 'required',
    //         'items_name' => 'required|string',
    //         'items_quantity' => 'required|integer',
    //     ]);

    //     // Find the room or fail
    //     $room = rooms::findOrFail($request->id);

    //     // Check if the item is available
    //     $itemAvailable = $this->itemavilable()
    //         ->where('name', $request->items_name) // Assuming 'name' is a column in your 'available' table
    //         ->where('quantity', '>=', $request->items_quantity) // Assuming 'quantity' is a column in your 'available' table
    //         ->exists();

    //     if ($itemAvailable) {
    //         // Add the item to the room
    //         // You need to implement the logic to add the item to the room here

    //         return response()->json(['message' => 'Item added successfully']);
    //     } else {
    //         return response()->json(['message' => 'Item not available'], 404);
    //     }
    // }
    // // 
    // // 
    // public function roomsItemsUpdate(Request $request)
    // {
    //     $request->validate([
    //         'rooms_id' => 'required',
    //         'id' => 'required',
    //         'items_name' => 'required|string',
    //         'items_quantity' => 'required|integer',
    //     ]);
    //     $item = items::where('rooms_id', $request->rooms_id)
    //         ->findOrFail($request->id);
    //     $item->update([
    //         "items_name" => $request->items_name,
    //         "items_quantity" => $request->items_quantity
    //     ]);
    //     return response()->json(['message' => 'successful']);
    // }
}
