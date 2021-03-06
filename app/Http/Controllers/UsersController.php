<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ticket;
use App\Models\AssignedDeveloper;
use App\Models\ProjectManager;
use App\Models\ProjectDeveloper;
use App\Models\AuditTrail;

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
        $login_user_id = auth()->user()->id;
        $users = User::orderBy('id')->get();
        return view('users.index')->with('login_user_id', $login_user_id)->with('users', $users);
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
        $login_user_id = auth()->user()->id;

        $auditTrail = AuditTrail::create([
            'action' => 'Created user',
            'action_name' => $request->input("name"),
            'id' => $login_user_id,
        ]);

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
        $login_user_id = auth()->user()->id;
        $users = User::find($id);
        $projectManagers = ProjectManager::where('id', '=', $id)->get();
        $projectDevelopers = ProjectDeveloper::where('id', '=', $id)->get();
        $assignedDevelopers = AssignedDeveloper::where('id', '=', $id)->get();
        $assignedTickets = AssignedDeveloper::pluck('id')->where('id', '=', $id);
        $submittedTickets = Ticket::where('id', '=', $id)->get();
        return view('users.show')->with('login_user_id', $login_user_id)->with('users', $users)->with('projectManagers', $projectManagers)->with('projectDevelopers', $projectDevelopers)->with('assignedDevelopers', $assignedDevelopers)->with('assignedTickets', $assignedTickets)->with('submittedTickets', $submittedTickets);
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
        $login_user_id = auth()->user()->id;

        $auditTrail = AuditTrail::create([
            'action' => 'Updated user details',
            'action_name' => $request->input("name"),
            'id' => $login_user_id,
        ]);

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
        $login_user_id = auth()->user()->id;

        $auditTrail = AuditTrail::create([
            'action' => 'Deleted user',
            'action_name' => 'Deleted',
            'id' => $login_user_id,
        ]);
        
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
