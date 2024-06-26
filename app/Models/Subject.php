<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subject_category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'subject_category_id');
    }

    public function diplomas()
    {
        return $this->belongsToMany(Diploma::class, 'diploma_subject')->withTimestamps();
    }
}
