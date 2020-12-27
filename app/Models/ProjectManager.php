<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectManager extends Model
{
    use HasFactory;
    protected $table = 'project_managers';
    public $timestamps = false;

    protected $fillable = ['project_id', 'id'];
}
