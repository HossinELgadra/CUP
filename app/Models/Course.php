<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Class1;
use App\Models\Year;

class Course extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "courses";
    protected $fillable = [
        'name','class_id','year_id','created_at','updated_at',
    ];

    public function Class1()
    {
        return $this->belongsTo(Class1::class);
    }

    public function Year()
    {
        return $this->belongsTo(Year::class);
    }
}
