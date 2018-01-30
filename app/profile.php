<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['name', 'email', 'number', 'dob', 'qualification', 'specialization', 'marks', 'passout', 'collegeaddress','homeaddress'];
}
