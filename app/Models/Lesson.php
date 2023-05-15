<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // protected $with = ['course'];
    protected $hidden = [];
    protected $fillable = [
        'course_id',
        'name',
        'slug',
        'youtube_url'
    ];

    protected $appends = ['next', 'previous'];

    public function getNextAttribute()
    {
        return $this->where('created_at', '>', $this->created_at)->orderBy('created_at', 'asc')->first();
    }

    public function getPreviousAttribute()
    {
        return $this->where('created_at', '<', $this->created_at)->orderBy('created_at', 'asc')->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
