<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContents extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_categories_id',
        'title',
        'description',
        'url',
        'content_type',
        'status'
    ];
    // CourseContent.php
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function section()
    {
        return $this->belongsTo(CourseSection::class);
    }
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
}
