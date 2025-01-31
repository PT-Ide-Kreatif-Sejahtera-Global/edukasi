<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructor_id',
        'title',
        'description',
        'price',
        'is_locked',
        'total_price',
        'foto',
    ];
    // Course.php
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    // Course.php
    public function contents()
    {
        return $this->hasMany(course_contents::class);
    }
    // Course.php
    public function category()
    {
        return $this->belongsTo(course_category::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }
    public function discuss()
    {
        return $this->hasMany(Discuss::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }
}
