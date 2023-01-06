<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;

class Class1 extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "class1";
    protected $fillable = [
        'class_name','created_at','year_id','updated_at','added_by','updated_by',
    ];

    public function Course()
    {
        return $this->hasMany(Course::class, 'class_id', 'id');
    }
}
