<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'rating', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'instructor_id');
    }
}
