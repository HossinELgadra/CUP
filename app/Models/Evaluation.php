<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "evaluation";
    protected $fillable = [
        'student_behavior','academic_evaluation','student_id','course_id','year_id','created_at','updated_at',
    ];
}
