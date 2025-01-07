<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_section extends Model
{
    use HasFactory;
    // CourseSection.php
    public function contents()
    {
        return $this->hasMany(course_section::class);
    }
}
