<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'priority',
        'project_id'
    ];

    /**
     * Get the Project that owns the task.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
