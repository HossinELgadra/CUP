<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "student";
    protected $fillable = [
        'student_name','user_id','DOB','parent_mobile','address','class_id','year_id','created_at','updated_at',
    ];
}
