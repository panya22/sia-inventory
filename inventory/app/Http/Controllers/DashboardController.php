<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard(){
        $totalClassroomItems = items::where('type', 'classroom')->count();

        $totalSchoolSupplyItems = items::where('type', 'school supply')->count();

        $totalAllItems = items::all()->count();


        return response()->json([
            'classroom' => $totalClassroomItems,
            'school_supply' => $totalSchoolSupplyItems,
            'all_items' =>  $totalAllItems
        ]);
    }
}
