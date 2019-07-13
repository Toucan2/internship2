<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Accomodation;

class ApiController extends Controller
{
    public function index()
    {
        $users = DB::table('accomodations')->get();
        return response()->json($users);
    }

    
    public function create()
    {
        return view('api.create');
    }

    
    public function store(Request $request)
    {
        $accomodation = new Accomodation();
        $accomodation->name = request('name');
        $accomodation->description = request('description');
        $accomodation->phonenumber = request('telephone');
        $accomodation->price = request('price');
        $accomodation->roomcount = request('rooms');

        $accomodation->save();

        // return response()->json($accomodation);
        // return redirect('/api/accomodations/' . $accomodation->id);
        return $this->show($accomodation->id);
    }

    
    public function show($id)
    {
        $user = DB::table('accomodations')->find($id);
        return response()->json($user);
    }

   
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        $deleted_user = DB::table('accomodations')->find($id);
        DB::delete('DELETE FROM accomodations WHERE id = ?', [$id]);    // not working with $id ( [$id] )
        return response()->json($deleted_user);
    }

    public function display() {
        $users = DB::table('accomodations')->get();
        return view('api.interactiveDisplay')->with('users', $users);
    }



}
