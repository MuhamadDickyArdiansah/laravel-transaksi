<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    // protected $with = ['course'];
    protected $hidden = [];
    protected $fillable = [
        'user_id',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
