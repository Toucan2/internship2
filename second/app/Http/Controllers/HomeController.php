<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Booking;

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
            ->leftJoin('users', 'users.id', '=', 'accommodations.owner_id')
            ->select('accommodations.*', 'users.name', 'users.email')
            ->orderBy('acc_id', 'asc')
            ->get();
        return view('home')->with('accommodations', $accommodations)->with('auth_email', Auth::user()->email);
    }

    public function list()
    {
        $email = Auth::user()->email;
        $myaccommodations = DB::table('accommodations')
            ->leftJoin('users', 'users.id', '=', 'accommodations.owner_id')
            ->select('accommodations.*', 'users.name', 'users.email')
            ->where('email', $email)
            ->orderBy('acc_id', 'asc')
            ->get();
        return view('myaccommodations')->with('accommodations', $myaccommodations);
    }

    public function owners()
    {
        $owners = DB::table('accommodations')
            ->leftJoin('users', 'users.id', '=', 'accommodations.owner_id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                DB::raw('count(accommodations.acc_id) as total'),
                DB::raw('sum(accommodations.price) as income')
            )
            ->groupBy('users.id')
            ->get();
        return view('owners')->with('owners', $owners);
    }

    public function displayForm(Request $request)
    {
        $acc_id = $request->query('id');
        $user_id = DB::table('users')->where('email', Auth::user()->email)->first()->id;  // email is unique (no 2 same emails)

        return view('book')->with('acc_id', $acc_id)->with('user_id', $user_id);
    }

    public function storeBooking()
    {
        $booking = new Booking();
        $booking->user_id = request('user_id');
        $booking->acc_id = request('acc_id');
        $booking->start_date = request('start_date');
        $booking->end_date = request('end_date');
        $booking->cost = 100;

        $booking->save();

        return response()->json([
            'success' => 'true'
        ]);
    }
}
