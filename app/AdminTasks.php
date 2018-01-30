<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminTasks extends Model
{
    protected $fillable = ['worknature', 'onskills', 'worktitle', 'workdescription', 'whatinitforme', 'usercredits', 'guidecredits', 'reviewercredits','uploads', 'created_at','updated_at'];
}
