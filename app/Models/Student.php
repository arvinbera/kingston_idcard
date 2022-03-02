<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = ['college_id', 'college_name', 'student_name', 'student_session', 'student_blood_group', 'student_mobile'];

    public $timestamps = false;
}
