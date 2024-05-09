<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Diploma;
use App\Models\StudyPlan;
use Illuminate\Http\Request;

class StudyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyPlans = StudyPlan::with('diplomas', 'courses')->paginate();
        return view('study_plans.index', compact('studyPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diplomas = Diploma::all();
        $courses = Course::all();
        return view('study_plans.create', compact('diplomas', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'diploma_id' => 'required|array',
            'diploma_id.*' => 'required|exists:diplomas,id',
            'course_id' => 'required|array',
            'course_id.*' => 'required|exists:courses,id',
        ]);

        $studyPlan = StudyPlan::create([
            'name' => $request->name
        ]);

        $studyPlan->diplomas()->attach($request->diploma_id);
        $studyPlan->courses()->attach($request->course_id);

        return redirect()->route('study-plans.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyPlan $studyPlan)
    {
        $diplomas = Diploma::all();
        $courses = Course::all();
        return view('study_plans.edit', compact('studyPlan', 'diplomas', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyPlan $studyPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'diploma_id' => 'required|array',
            'diploma_id.*' => 'required|exists:diplomas,id',
            'course_id' => 'required|array',
            'course_id.*' => 'required|exists:courses,id',
        ]);

        $studyPlan->update([
            'name' => $request->name
        ]);

        $studyPlan->diplomas()->sync($request->diploma_id);
        $studyPlan->courses()->sync($request->course_id);

        return redirect()->route('study-plans.index')->with('success', 'Study plan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyPlan $studyPlan)
    {
        $studyPlan->diplomas()->detach();
        $studyPlan->courses()->detach();
        $studyPlan->delete();
        return redirect()->route('study-plans.index')->with('success', 'Study plan deleted successfully');
    }
}
