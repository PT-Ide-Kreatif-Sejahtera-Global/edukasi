<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussComment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'discuss_id', 'content'];

    public function discuss()
    {
        return $this->belongsTo(Discuss::class);
    }
}
