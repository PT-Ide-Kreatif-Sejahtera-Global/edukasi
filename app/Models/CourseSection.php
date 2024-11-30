<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;
    // CourseSection.php
    public function contents()
    {
        return $this->hasMany(CourseSection::class);
    }
}
