<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use model Category
use App\Models\Category;
class Category extends Model
{
    use HasFactory;

    public function exams()
    {
        return $this->hasMany(Exam::class, 'category_id', 'id');
    }
}
