<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Accomodation;

class AccomodationsController extends Controller
{
    public function index() {
        $users = DB::table('accomodations')->get();
        return view('accomodations.list')->with('users', $users);
    }

    public function create() {
        return view('accomodations.create');
    }

    public function store() {
        $accomodation = new Accomodation();
        $accomodation->name = request('name');
        $accomodation->description = request('description');
        $accomodation->phonenumber = request('telephone');
        $accomodation->price = request('price');
        $accomodation->roomcount = request('rooms');

        $accomodation->save();

        // return redirect('/accomodations');
    }

    public function show($id) {
        $user = DB::table('accomodations')->find($id);
        return view('accomodations.show')->with('user', $user)->with('id', $id);
    }

    public function destroy($id) {
        DB::delete('DELETE FROM accomodations WHERE id = ?', [$id]);    // not working with $id ( [$id] )
        return redirect('/accomodations');
    }

    public function dashboard() {
        $users = DB::table('accomodations')->get();
        return view('accomodations.dashboard')->with('users', $users);
    }
}
