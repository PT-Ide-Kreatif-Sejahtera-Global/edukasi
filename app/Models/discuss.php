<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discuss extends Model
{
    use HasFactory;

    protected $table = 'discusses';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',       // ID user yang membuat komentar
        'course_id',     // ID course terkait
        'content',       // Isi komentar
        'created_at',    // Timestamp komentar dibuat
        'updated_at',    // Timestamp komentar diperbarui
    ];

    // Relasi ke model User (yang membuat komentar)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke model Course (kursus terkait komentar)
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    // Relasi ke komentar
    public function discussComments()
    {
        return $this->hasMany(discuss_comment::class, 'discuss_id');
    }
}
