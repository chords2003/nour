<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Follow;
use Illuminate\Routing\Route;
use App\Http\Requests\StoreFollowRequest;
use App\Http\Requests\UpdateFollowRequest;
use App\Http\Requests\StoreGroupUserRequest;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = Group::with('users')->get();
        $user = User::with('posts', 'likes')->get();
        return view('profile.friends.friends-list', [
            'users' => $user,
            'groups' => $group,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFollowRequest $request, User $user)
    {

        //validate the user request and create a new follow
        auth()->user()->follow($user);
        return to_route('follows')->with('success', 'You are now following ' . $user->name);

    }

    //create the unfollow method
    public function unfollow(StoreFollowRequest $request, User $user)
    {
        auth()->user()->unfollow($user);
        return back()->with('success', 'You are no longer following ' . $user->name);
    }

    public function join(StoreGroupUserRequest $request, Group $group)
    {

        // dd($request->all());
        $this->authorize('join', $group);
        $user = auth()->user();
        $group->users()->attach($user->id);

        return redirect("/groups/{$group->title}");
    }



    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //show the follower of the current user
        $user = auth()->user();
        $followers = $user->followers;
        return view('profile.friends.friends-list', [
            'followers' => $followers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFollowRequest $request, Follow $follow, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow $follow, User $user)
    {
        auth()->user()->unfollow($user);
        return back()->with('success', 'You are no longer following ' . $user->name);
    }
}
