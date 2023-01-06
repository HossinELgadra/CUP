<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Attendence extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "attendence";
    protected $fillable = [
        'attendence','student_id','class_type_id','year_id','created_at','updated_at',
    ];
}
