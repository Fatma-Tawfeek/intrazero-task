<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $coursesCount = \App\Models\Course::count();
        $diplomasCount = \App\Models\Diploma::count();
        $studyPlansCount = \App\Models\StudyPlan::count();
        $tutorsCount = \App\Models\User::where('role_id', 2)->count();
        return view('dashboard', compact('coursesCount', 'diplomasCount', 'studyPlansCount', 'tutorsCount'));
    }
}
