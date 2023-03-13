<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveysController extends Controller
{
    public function index()
    {
        return view('surveys.index');
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
