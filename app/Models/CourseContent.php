<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'course_category_id', 'section_id', 'title', 'url', 'duration'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
