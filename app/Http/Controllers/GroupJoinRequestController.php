<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupJoinRequestRequest;
use App\Http\Requests\UpdateGroupJoinRequestRequest;
use App\Models\GroupJoinRequest;

class GroupJoinRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $requests = GroupJoinRequest::where('status', 'pending')->get();

    return view('groups.request', ['requests' => $requests]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function approve(GroupJoinRequest $request)
    {
        $request->user->groups()->attach($request->group);

        return redirect()->back()->with('success', 'User added to group');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupJoinRequestRequest $request)
    {
        //validate the user's request
        $validated = $request->validated();
        //create a new group join request
        $groupJoinRequest = GroupJoinRequest::create([
            'user_id' => $validated['user_id'],
            'group_id' => $validated['group_id'],
        ]);
        //redirect the user back to the group page
        return redirect()->back()->with('success', 'Group join request sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupJoinRequest $groupJoinRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupJoinRequest $groupJoinRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupJoinRequestRequest $request, GroupJoinRequest $groupJoinRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupJoinRequest $groupJoinRequest)
    {
        //
    }
}
