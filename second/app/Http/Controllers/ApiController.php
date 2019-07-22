<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function sortedIndex(Request $request)
    {
        $type = $request->query('sort', 'id');
        $accommodations = DB::table('accommodations')
            ->leftJoin('users', 'users.id', '=', 'accommodations.owner_id')
            ->select('accommodations.*', 'users.name', 'users.email');

        switch ($type) {
            case 'id':
                return response()->json(
                    $accommodations->orderBy('accommodations.acc_id', 'asc')->get()
                );
                break;

            case 'price':
                return response()->json(
                    $accommodations->orderBy('accommodations.price', 'desc')->get()
                );
                break;

                // case 'value':
                //     # code...
                //     break;
        }
    }
}
