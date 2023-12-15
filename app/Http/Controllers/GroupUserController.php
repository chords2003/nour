<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupUser;
use App\Http\Requests\StoreGroupUserRequest;
use App\Http\Requests\UpdateGroupUserRequest;
use App\Models\GroupJoinRequest;
use App\Models\JoinRequest;
use Illuminate\Http\Client\Request;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('groups.index', [
    //         'groups' => Group::orderedBy('updated_at', 'desc')->with('users')->paginate(1),
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {
        //return the view for creating a new group
        return view('groups.request', [
            'group' => $group,
        ]);
    }

    // public function join(StoreGroupUserRequest $request, GroupUser $group)
    // {

    //     // dd($request->all());
    //     $this->authorize('join', $group);
    //     $user = auth()->user();
    //     $group->users()->attach($user->id);

    //     return redirect("/groups/{$group->title}");
    // }

    public function request(StoreGroupUserRequest $request, Group $group)
    {
        // $this->authorize('request', $group);
        // $user = auth()->user();
        // $group->joinRequests()->create([
        //     'user_id' => $user->id,
        //     'group_id' => $group->id,
        // ]);

    $user = auth()->user();
    //check if group is owned by the current authenticated user and the user is not already a member
    if ($group->owner_id === $user->id){
        return redirect()->back()->with('success', 'You are the owner of this group');
    } elseif ($group->users->contains($user->id)) {
        return redirect()->back()->with('success', 'You are already a member of this group');
    }

    $joinRequest = new GroupJoinRequest();
    $joinRequest->user_id = $user->id;
    $joinRequest->group_id = $group->id;
    $joinRequest->status = 'pending'; // Or whatever the default status is

    $joinRequest->save();

    return redirect()->back();

        // return redirect("/groups/{$group->title}");
        return redirect()->route('groups', ['group' => $group->title])->with('success','Your request has been sent');
    }

    public function accept(GroupUser $groupUser)
    {
        $this->authorize('accept', $groupUser);
        $groupUser->update([
            'status' => 'accepted',
        ]);

        return redirect("/groups/{$groupUser->group->title}");
    }

    //create  a method to show all pending group requests
    // public function pendingRequests()
    // {

    //     $user = auth()->user();
    //     $requests = $user->groupJoinRequests()->with('group');

    //     return view('groups.request', [
    //         'requests' => $requests,
    //     ]);
    // }

    public function pendingRequests(Group $group)
{
    $user = auth()->user();
    $requests = $user->groupJoinRequests;

    return view('groups.request', [
        'requests' => $requests,
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupUserRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Access validated data
        $title = $validatedData['title'];
        $description = $validatedData['description'];


        $group = new Group;
        $group->title = $request->title;
        $group->description = $request->description;
        $group->owner_id = auth()->user()->id;

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $group->image = $path;
        }
        // if (isset($imageName)) {
        //     $group->image = 'images/groups/' . $imageName;
        // }

        $group->save();

        return redirect()->route('groups', ['group' => $group->title])->with('success','Great, your group has been created successfully!');



    }

    /**
     * Display the specified resource.
     */
    public function show(GroupUser $groupUser)
    {
        return view('groups.index', [
            'groups' => Group::orderedBy('updated_at', 'desc')->with('users')->paginate(1),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupUser $groupUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupUserRequest $request, GroupUser $groupUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupUser $groupUser)
    {
        //
    }
}
