<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        $title = 'Dashboard';
        return view('pages.dashboard')->with($title);
    }

    public function user(){
        $title = 'Users';
        return view('pages.users')->with($title);
    }

    public function project(){
        $title = 'Projects';
        return view('pages.projects')->with($title);
    }

    public function ticket(){
        $title = 'Tickets';
        return view('pages.tickets')->with($title);
    }

    public function profile(){
        $title = 'Profile';
        return view('pages.profile')->with($title);
    }
}