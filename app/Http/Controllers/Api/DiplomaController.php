<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{

    public function index()
    {
        $this->authorize('view-diplomas', Diploma::class);
        $diplomas = Diploma::with('subjects', 'studyPlans')->get();
        return response()->json($diplomas, 200);
    }
}
