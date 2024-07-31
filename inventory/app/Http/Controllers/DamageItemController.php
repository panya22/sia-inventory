<?php

namespace App\Http\Controllers;

use App\Models\damageItems;
use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DamageItemController extends Controller
{
    public function index()
    {
        $items = damageItems::all();
        return response()->json($items);
    }

    public function repairItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:damaged_items,item_id',
            'quantity' => 'required|integer',
        ]);

        // Find the damaged item using the item_id
        $damagedItem = damageItems::where('item_id', $request->item_id)->first();

        // Find the original item
        $item = items::find($damagedItem->item_id);

        // Update the item's stock
        $item->item_quantity += $request->quantity;
        $item->save();

        $damagedItem->delete();

        return response()->json(['message' => 'Item repaired successfully']);
    }

    public function totalDamagedQuantitiesPerItem()
    {
        $damagedQuantities = damageItems::select('item_id', DB::raw('SUM(quantity) as total_damaged'))
            ->groupBy('item_id')
            ->get();

        return response()->json($damagedQuantities);
    }
}
