<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login(){
        $title = 'Login';
        return view('auth.login')->with($title);
    }

    public function register(){
        $title = 'Register';
        return view('auth.register')->with($title);
    }

    public function dashboard(){
        $title = 'Dashboard';
        return view('dashboard')->with($title);
    }

    public function user(){
        $title = 'Users';
        return view('users.index')->with($title);
    }

    public function project(){
        $title = 'Projects';
        return view('projects.index')->with($title);
    }

    public function ticket(){
        $title = 'Tickets';
        return view('tickets.index')->with($title);
    }

    public function profile(){
        $title = 'Profile';
        return view('pages.profile')->with($title);
    }
}