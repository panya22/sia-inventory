<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function displayItems(Request $request)
    {
        $item = items::all();
        return $item;
    }


    public function addItems(Request $request)
    {
        $request->validate([
            'items_name' => 'required',
            'items_quantity' => 'required',
        ]);


        $item = new items();
        $item->items_name = $request->items_name;
        $item->items_quantity = $request->items_quantity;

        $item->save();
    }

    public function updateItems(Request $request)
    {
        $item = items::findOrFail($request->id);

        $request->validate([
            'items_name' => 'required',
            'items_quantity' => 'required|numeric'
        ]);

        $item->update([
            'items_name' => $request->items_name,
            'items_quantity' => $request->items_quantity
        ]);

        return response()->json(['message' => 'successful']);
    }

    public function deleteItems(Request $request)
    {
        $items = items::findOrFail($request->id);
        $items->delete();
        return response()->json(['message' => 'successfull']);
    }

    public function getAvailableItems()
    {
        $availableItems = items::whereDoesntHave('roomInventories')->get();
        return response()->json($availableItems);
    }
}
