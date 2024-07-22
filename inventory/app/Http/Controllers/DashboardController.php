<?php

namespace App\Http\Controllers;

use App\Models\borrowedItems;
use App\Models\damageItems;
use App\Models\items;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // Calculate overall totals
        $totals = [
            'item_quantity' => items::sum('item_quantity'),
            'borrowed_items' => borrowedItems::sum('quantity'),
            'overdue_items' => borrowedItems::where('status', 'Overdue')->sum('quantity'),
            'damaged_items' => damageItems::sum('quantity'),
        ];

        // Calculate totals for Junior High School
        $juniorHighInventory = [
            'item_quantity' => items::where('school_level', 'Junior High School')->sum('item_quantity'),
            'borrowed_items' => borrowedItems::where('school_level', 'Junior High School')->sum('quantity'),
            'overdue_items' => borrowedItems::where('school_level', 'Junior High School')->where('status', 'Overdue')
            ->sum('quantity'),
            'damaged_items' => damageItems::where('school_level', 'Junior High School')->sum('quantity'),
        ];

        // Calculate totals for Senior High School
        $seniorHighInventory = [
            'item_quantity' => items::where('school_level', 'Senior High School')->sum('item_quantity'),
            'borrowed_items' => borrowedItems::where('school_level', 'Senior High School')->sum('quantity'),
            'overdue_items' => borrowedItems::where('school_level', 'Senior High School')->where('status', 'Overdue')
            ->sum('quantity'),
            'damaged_items' => damageItems::where('school_level', 'Senior High School')->sum('quantity'),
        ];

        return response()->json([
            'totals' => $totals,
            'juniorHighInventory' => $juniorHighInventory,
            'seniorHighInventory' => $seniorHighInventory,
        ]);

    }
}
