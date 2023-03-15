<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveysController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('surveys.index', compact('user'));
    }
    
    public function store(Request $request)
    {
        $requestData = $request->all();
        
        $survey = Survey::create($requestData);

        return response()->json([
            'id' => $survey->id,
        ]);
    }
}
