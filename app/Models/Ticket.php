<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $primaryKey = 'ticket_id';
    protected $dates = ['due_date'];

    public function ticketType() {
        return $this->belongsTo('App\Models\TicketType', 'type_id', 'type_id');
    }

    public function ticketStatus() {
        return $this->belongsTo('App\Models\TicketStatus', 'status_id', 'status_id');
    }

    public function ticketPriority() {
        return $this->belongsTo('App\Models\TicketPriority', 'priority_id', 'priority_id');
    }
}
