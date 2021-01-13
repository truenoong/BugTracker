<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedDeveloper extends Model
{
    use HasFactory;
    protected $table = 'assigned_developers';
    protected $fillable = ['ticket_id', 'id'];
    public $timestamps = false;

    public function assignedDeveloper() {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    public function ticket() {
        return $this->belongsTo('App\Models\Ticket', 'id', 'id');
    }
}
