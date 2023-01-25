<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Group;
use App\Models\Member;
use App\Models\Student;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Group $group, Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $members = Member::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('student_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $members = Member::latest()->paginate($perPage);
        }

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Group $group)
    {
        $students = Student::all();
        return view('members.create', compact('group', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Group $group, Request $request)
    {
        
        $requestData = $request->all();
        
        Member::create($requestData);
        // route('profile', ['id' => 1]);
        return redirect()->route('groups.show', $group)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Group $group, $id)
    {
        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Group $group, $id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Group $group, Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $member = Member::findOrFail($id);
        $member->update($requestData);

        return redirect('members')->with('flash_message', 'Member updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Group $group, $id)
    {
        Member::destroy($id);

        return redirect('members')->with('flash_message', 'Member deleted!');
    }
}
