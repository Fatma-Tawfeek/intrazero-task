<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function courses()
    {
        return $this->morphedByMany(Course::class, 'study_plannable')->withTimestamps();
    }

    public function diplomas()
    {
        return $this->morphedByMany(Diploma::class, 'study_plannable')->withTimestamps();
    }
}
