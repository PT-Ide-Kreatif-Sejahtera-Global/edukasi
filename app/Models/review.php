<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'instructor_id',
        'bintang',
        'komentar',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke tabel instructors
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
