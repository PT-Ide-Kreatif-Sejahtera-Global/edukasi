<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
