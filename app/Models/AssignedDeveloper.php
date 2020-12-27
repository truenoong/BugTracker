<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedDeveloper extends Model
{
    use HasFactory;
    protected $table = 'assigned_developers';
    public $timestamps = false;

    protected $fillable = ['ticket_id', 'id'];
}
