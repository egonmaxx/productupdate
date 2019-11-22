<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestDbConnectionController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        if (DB::connection()->getPDO()) {
            $connected = true;
        } else {
            $connected = false;
        }
        return view('testdbconnection',['isDbConnected' => $connected]);
    }
}