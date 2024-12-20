<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'coupon_id',
        'enrollment_date',
        'discount_amount',
        'total_price',
        'udemy_coupon', // 1 if using a coupon, 0 if not
        'status'
    ];

    /**
     * Define the relationship with the Course model.
     * An enrollment belongs to a course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'id');
    }

    /**
     * Define the relationship with the User model.
     * An enrollment belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Define the relationship with the Coupon model.
     * An enrollment belongs to a coupon (optional).
     */
    public function coupon()
    {
        return $this->belongsTo(cupon::class);
    }
}
