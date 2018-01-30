<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignTasks extends Model
{
    protected $fillable = ['task_id', 'user_id', 'guide_id', 'reviewer_id', 'marks', 'assigned_date', 'completion_date'];
}
