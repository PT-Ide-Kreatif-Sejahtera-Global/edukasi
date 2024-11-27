<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructor extends Model
{
    use HasFactory;
    protected $table = 'instructors';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'bio',
        'rating',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Course.php
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    
}
