<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Presence;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;

class PresencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Schedule $schedule, Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $presences = Presence::where('schedule_id', 'LIKE', "%$keyword%")
                ->orWhere('student_id', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('start_at', 'LIKE', "%$keyword%")
                ->orWhere('end_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $presences = Presence::latest()->paginate($perPage);
        }

        return view('presences.index', compact('presences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Schedule $schedule)
    {
        $students = Student::all();
        return view('presences.create', compact('students', 'schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Schedule $schedule, Request $request)
    {
        $request->request->add(['schedule_id' => $schedule->id]); 
        $requestData = $request->all();
        
        Presence::create($requestData);

        return redirect('schedules', $schedule)->with('flash_message', 'Presence added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Schedule $schedule, $id)
    {
        $presence = Presence::findOrFail($id);

        return view('presences.show', compact('presence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Schedule $schedule, $id)
    {
        $presence = Presence::findOrFail($id);

        return view('presences.edit', compact('presence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Schedule $schedule, Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $presence = Presence::findOrFail($id);
        $presence->update($requestData);

        return redirect('presences')->with('flash_message', 'Presence updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Schedule $schedule, $id)
    {
        Presence::destroy($id);

        return redirect('presences')->with('flash_message', 'Presence deleted!');
    }
}
