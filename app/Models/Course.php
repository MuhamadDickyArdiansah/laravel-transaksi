<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $with = ['category', 'lessons', 'wishlist'];
    protected $hidden = [];
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'slug',
        'rating',
        'price',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }
}
