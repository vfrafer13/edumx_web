<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'duration',
        'requirements',
        'topics'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function instructorUser()
    {
        return $this->belongsTo('App\User', 'instructor');
    }

    /**
     * Get the category record associated with the course.
     */
    public function cat()
    {
        return $this->belongsTo('App\Category', 'category');
    }

    public function files() {
        return $this->hasMany('App\CourseFile');
    }
}
