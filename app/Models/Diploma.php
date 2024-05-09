<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'diploma_subject')->withTimestamps();
    }

    public function studyPlans()
    {
        return $this->belongsToMany(Course::class, 'study_plannable')->withTimestamps();
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
