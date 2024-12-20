<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discuss_comment extends Model
{
    use HasFactory;
    protected $table = 'discuss_comments';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',       // ID user yang membuat komentar
        'discuss_id',     // ID course terkait
        'content',       // Isi komentar
        'created_at',    // Timestamp komentar dibuat
        'updated_at',    // Timestamp komentar diperbarui
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke diskusi utama
    public function discuss()
    {
        return $this->belongsTo(Discuss::class, 'discuss_id');
    }
}
