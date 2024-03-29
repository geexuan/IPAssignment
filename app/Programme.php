<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model {

    protected $primaryKey = 'progId';
    public $incrementing = false;
    
    public function courses() {
        return $this->belongsToMany(Course::class, 'progstruc', 'progId', 'courseId');
    }

    public function campuses() {
        return $this->belongsToMany(Campus::class, 'progcampus', 'progId', 'campusId');
    }

}
