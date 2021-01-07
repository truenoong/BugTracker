<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $primaryKey = 'project_id';
    public $timestamps = true;

    public function projectManager() {
        return $this->belongsTo('App\Models\ProjectManager', 'project_id', 'project_id');
    }

    public function projectDeveloper() {
        return $this->belongsTo('App\Models\ProjectDeveloper', 'project_id', 'project_id');
    }
}
