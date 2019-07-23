<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function sortedList(Request $request)
    {
        $email = $request->query('email', '');
        $email = ($email != '') ? $email : Auth::user()->email;

        $type = $request->query('sort', 'id');
        $accommodations = DB::table('accommodations')
            ->leftJoin('users', 'users.id', '=', 'accommodations.owner_id')
            ->select('accommodations.*', 'users.name', 'users.email')
            ->where('email', $email);

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
        }
    }

    public function sortedOwners(Request $request)
    {
        $type = $request->query('sort', 'id');
        $owners = DB::table('accommodations')
            ->leftJoin('users', 'users.id', '=', 'accommodations.owner_id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                DB::raw('count(accommodations.acc_id) as total'),
                DB::raw('sum(accommodations.price) as income')
            )
            ->groupBy('users.id');

        switch ($type) {
            case 'id':
                return response()->json(
                    $owners->orderBy('accommodations.acc_id', 'asc')->get()
                );
                break;

            case 'income':
                return response()->json(
                    $owners->orderBy('income', 'desc')->get()
                );
                break;

            case 'total':
                return response()->json(
                    $owners->orderBy('total', 'desc')->get()
                );
                break;
        }
    }
}
