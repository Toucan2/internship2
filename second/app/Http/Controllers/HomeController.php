<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\Accommodation;
use DateTime;

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
        $user_id = Auth::user()->id;  // email is unique (no 2 same emails)
        $cost = Accommodation::find($acc_id)->price;

        return view('book')->with('acc_id', $acc_id)->with('user_id', $user_id)->with('cost', $cost);
    }

    public function storeBooking()
    {

        $start = request('start_date');
        $end = request('end_date');
        $booked_dates = DB::table('bookings')
            ->where('end_date', '>=', $start)
            ->where('start_date', '<=', $end)
            ->select('start_date', 'end_date')
            ->get();

        if (count($booked_dates) != 0) {
            return response()->json(['error' => 'error'], 500);
        }

            $booking = new Booking();
            $booking->user_id = request('user_id');
            $booking->acc_id = request('acc_id');
            $booking->start_date = request('start_date'); // "2019-11-15"
            $booking->end_date = request('end_date');

            // calculate days
            $start = new DateTime(request('start_date'));
            $end = new DateTime(request('end_date'));
            $days = $start->diff($end)->days;

            $booking->cost = $days * Accommodation::find($booking->acc_id)->price;

            $booking->save();

            return response()->json([
                'status' => 'success',
                'info' => ''
            ]);
    }

    public function myBookings()
    {
        $id = Auth::user()->id;
        $mybookings = DB::table('bookings')
            ->select('acc_id', 'start_date', 'end_date', 'cost')
            ->orderBy('bookings.acc_id', 'asc')
            ->get();

        return view('mybookings')->with('bookings', $mybookings);
    }
}
