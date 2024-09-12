<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    //accessor which add subdirectory path in imge path attribute
    public function getImagePathAttribute($value)
    {
        return 'exams/' . $value;
    }

    public function getExamDateAttribute($value)
    {
        //return date in format 1st January 2021 only when route is exams.list but when route is exams.edit then return date in format 2021-01-01
        if (request()->routeIs('exams.list')) {
            return date('jS F Y', strtotime($value));
        } else {
            return $value;
        }
    }
}
