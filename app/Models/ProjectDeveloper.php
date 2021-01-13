<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDeveloper extends Model
{
    use HasFactory;
    protected $table = 'project_developers';
    protected $fillable = ['project_id', 'id'];
    public $timestamps = false;

    public function projectDeveloper() {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    public function project() {
        return $this->belongsTo('App\Models\Project', 'project_id', 'project_id');
    }
}
