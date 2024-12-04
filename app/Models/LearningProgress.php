<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningProgress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'content_id', 'is_completed', 'completed_date', 'time_spent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function content()
    {
        return $this->belongsTo(CourseContent::class);
    }
}
