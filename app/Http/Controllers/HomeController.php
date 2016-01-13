<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::check())
        {
            return redirect('/order');
        } else {
            return redirect('/login');
        }
    }
}
