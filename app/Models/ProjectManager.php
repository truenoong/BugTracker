<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectManager extends Model
{
    use HasFactory;
    protected $table = 'project_managers';
    protected $fillable = ['project_id', 'id'];
    public $timestamps = false;

    public function projectManager() {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
}
