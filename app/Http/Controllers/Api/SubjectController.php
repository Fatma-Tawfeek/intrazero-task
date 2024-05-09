<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create-subjects', Subject::class);
        $validated_data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'subject_category_id' => 'required|exists:subject_categories,id'
        ]);

        $Subject = Subject::create($validated_data);

        return response()->json($Subject, 201);
    }
}
