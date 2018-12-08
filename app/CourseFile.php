<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFile extends Model
{
    protected $fillable = ['path', 'name'];

    public function course() {
        return $this->belongsTo('App\Course');
    }
}
