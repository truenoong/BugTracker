<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        $title = 'Dashboard';
        return view('pages.dashboard')->with($title);
    }
}