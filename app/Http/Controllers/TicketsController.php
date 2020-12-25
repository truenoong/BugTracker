<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;

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

        $ticket_type = Ticket::pluck('ticket_type');
        $types = DB::table('ticket_types')->where('type_id', '=', $ticket_type)->get();

        $ticket_status = Ticket::pluck('ticket_status');
        $statuses = DB::table('ticket_statuses')->where('status_id', '=', $ticket_status)->get();

        $ticket_priority = Ticket::pluck('ticket_priority');
        $priorities = DB::table('ticket_priorities')->where('priority_id', '=', $ticket_priority)->get();

        return view('tickets.index')->with('tickets', $tickets)->with('types', $types)->with('statuses', $statuses)->with('priorities', $priorities);
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
        $ticket->ticket_type = $request->input('ticket_types');
        $ticket->ticket_status = $request->input('ticket_statuses');
        $ticket->ticket_priority = $request->input('ticket_priorities');
        $ticket->assigned_user = $request->input('assigned_user');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
