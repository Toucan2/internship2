<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accommodations = DB::table('accommodations')
            ->leftJoin('users', 'users.email', '=', 'accommodations.owner_email')
            ->select('accommodations.*', 'users.name', 'users.email')
            ->orderBy('id', 'asc')
            ->get();
        return view('home')->with('accommodations', $accommodations);
    }

    public function list()
    {
        $email = Auth::user()->email;
        $myaccommodations = DB::table('accommodations')
            ->leftJoin('users', 'users.email', '=', 'accommodations.owner_email')
            ->select('accommodations.*', 'users.name', 'users.email')
            ->where('owner_email', $email)
            ->orderBy('id', 'asc')
            ->get();
        return view('myaccommodations')->with('accommodations', $myaccommodations);
    }

    public function owners()
    {
        $owners = DB::table('users')
            ->select('users.id', 'users.name', 'users.email')
            ->get();
        return view('owners')->with('owners', $owners);
    }
}
