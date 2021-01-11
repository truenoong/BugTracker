<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\AssignedDeveloper;
use App\Models\ProjectManager;
use App\Models\ProjectDeveloper;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->pluck('name', 'id');
        $password = $hashed_random_password = Hash::make(str_random(8));
        $roles = DB::table('roles')->pluck('role_name', 'role_id');
        return view('users.create')->with('users', $users)->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->role_id = $request->input("role");
        $user->save();

        return redirect('/users')->with('success', 'Successfully Created a New User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $roles = DB::table('roles')->pluck('role_name', 'role_id');
        $selectedRole = User::where('id', '=', $id)->pluck('role_id');
        return view('users.edit')->with('users', $users)->with('roles', $roles)->with('selectedRole', $selectedRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->role_id = $request->input("role");
        $user->save();

        return redirect('/users')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $assignedDeveloper = AssignedDeveloper::where('id', '=', $id);
        $assignedDeveloper->delete();
        $projectManager = ProjectManager::where('id', '=', $id);
        $projectManager->delete();
        $projectDeveloper = ProjectDeveloper::where('id', '=', $id);
        $projectDeveloper->delete();
        $user->delete();
        return redirect('/users')->with('success', 'Successfully deleted');
    }
}
