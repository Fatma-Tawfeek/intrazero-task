<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(SubjectCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(SubjectCategory::class, 'parent_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
