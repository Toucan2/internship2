<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBAccess extends Controller
{
    public static function owner_totalAccommodations($targetEmail) {
        $count = DB::table('accommodations')
            ->where('owner_email', $targetEmail)
            ->count();
        return $count;
    }
    
    public static function owner_totalIncome($targetEmail) {
        $income = DB::table('accommodations')
            ->where('owner_email', $targetEmail)
            ->sum('price');
        return $income;
    }
}
