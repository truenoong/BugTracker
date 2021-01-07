<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketStatus;
use App\Models\TicketPriority;
use App\Models\User;
use App\Models\AssignedDeveloper;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('ticket_id')->get();

        return view('tickets.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->pluck('name', 'id');
        $ticket_types = DB::table('ticket_types')->pluck('type_name', 'type_id');
        $ticket_statuses = DB::table('ticket_statuses')->pluck('status_name', 'status_id');
        $ticket_priorities = DB::table('ticket_priorities')->pluck('priority_name', 'priority_id');

        return view('tickets.create')->with('ticket_types', $ticket_types)->with('ticket_statuses', $ticket_statuses)->with('ticket_priorities', $ticket_priorities)->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $ticket = new Ticket;
        $ticket->ticket_name = $request->input("name");
        $ticket->ticket_desc = $request->input("description");
        $ticket->type_id = $request->input('ticket_types');
        $ticket->status_id = $request->input('ticket_statuses');
        $ticket->priority_id = $request->input('ticket_priorities');
        $ticket->due_date = Carbon::parse($request->input('due_date'));
        $ticket->save();

        return redirect('/tickets')->with('success', 'Successfully Created a New Ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $assignedDevelopers = AssignedDeveloper::where('ticket_id', '=', $id)->get();

        return view('tickets.show')->with('ticket', $ticket)->with('assignedDevelopers', $assignedDevelopers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $ticket_types = DB::table('ticket_types')->pluck('type_name', 'type_id');
        $ticket_statuses = DB::table('ticket_statuses')->pluck('status_name', 'status_id');
        $ticket_priorities = DB::table('ticket_priorities')->pluck('priority_name', 'priority_id');
        $users = DB::table('users')->pluck('name', 'id');
        $assignedDevelopers = DB::table('assigned_developers')->where('ticket_id', '=', $id)->pluck('id');
        return view('tickets.edit')->with('ticket', $ticket)->with('ticket_types', $ticket_types)->with('ticket_statuses', $ticket_statuses)->with('ticket_priorities', $ticket_priorities)->with('users', $users)->with('assignedDevelopers', $assignedDevelopers);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $ticket = Ticket::find($id);
        $ticket->ticket_name = $request->input("name");
        $ticket->ticket_desc = $request->input("description");
        $ticket->type_id = $request->input('ticket_types');
        $ticket->status_id = $request->input('ticket_statuses');
        $ticket->priority_id = $request->input('ticket_priorities');
        $ticket->due_date = Carbon::parse($request->input('due_date'));
        $ticket->save();

        $assignedDeveloper = AssignedDeveloper::where('ticket_id', '=', $id);
        $assignedDeveloper->delete();

        foreach($request->assigned_developers as $assigned_developer) {
            AssignedDeveloper::create([
                'ticket_id' => $ticket->ticket_id,
                'id' => $assigned_developer
            ]);
        }

        return redirect('/tickets')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $assignedDeveloper = AssignedDeveloper::where('ticket_id', '=', $id);
        $assignedDeveloper->delete();
        $ticket->delete();
        return redirect('/tickets')->with('success', 'Successfully deleted');
    }
}
