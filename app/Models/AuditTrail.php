<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;
    protected $table = 'audit_trail';
    protected $fillable = ['action', 'action_name', 'id', 'created_at'];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
}
