<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LogOutController extends Controller
{

    public function update()
    {
        Auth::logout();
        return redirect()->route('challenges.index');
    }
}
