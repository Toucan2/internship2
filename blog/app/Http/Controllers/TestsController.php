<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function destroy($id) {
        DB::delete('DELETE FROM accomodations WHERE id = ?', [$id]);    // not working with $id ( [$id] )
        return redirect('/accomodations');
    }
}
