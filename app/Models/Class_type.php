<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Class_type extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "class_type";
    protected $fillable = [
        'name','created_at','updated_at','added_by','updated_by','class_id','year_id',
    ];
}
