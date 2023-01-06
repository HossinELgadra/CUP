<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;

class Year extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "year";
    protected $fillable = [
        'name','created_at','updated_at',
    ];

    public function Course()
    {
        return $this->hasMany(Course::class, 'year_id', 'id');
    }
}
