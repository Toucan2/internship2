<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Accomodation;

class AccomodationsController extends Controller
{
    public function list() {
        $users = DB::table('accomodations')->get();
        return view('accomodations.list')->with('users', $users);
    }

    public function show($id) {
        $user = DB::table('accomodations')->find($id);
        return view('accomodations.show')->with('user', $user);
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

        return redirect('/accomodations');
    }
}
