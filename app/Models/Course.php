<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['instructor_id', 'title', 'description', 'price', 'is_locked', 'total_price', 'photo'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discuss::class);
    }
}
