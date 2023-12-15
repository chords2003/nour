<?php

namespace App\Http\Controllers;


use DB;
use App\Followable;
use App\Models\User;
use App\Models\Group;
use App\Models\Follow;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreFollowRequest;
use App\Http\Requests\UpdateFollowRequest;

class FollowController extends Controller
{
    Use Followable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('hello');
        //show the follower of the current user
        $groups = Group::with('users')->get();

        $follows = auth()->user()->follows;
        return view('profile.friends.friends-list',compact('follows', 'groups'));
    }

    //create a method to follow a user
    // public function follow(User $otherUser)
    // {
    //     $user = auth()->user();

    //     // Check if the authenticated user is not already following the other user
    //     if (!$user->isFollowing($otherUser)) {
    //         $user->follow($otherUser);
    //     }

    //     // Redirect or respond as needed
    //     return redirect()->back();
    // }

    public function unfollow(User $user) {

        auth()->user()->following()->detach($user->id);

        return redirect()->back()->with('success', 'You unfollowed '.$user->name);

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
        //check if the user is already following the other user
        if (auth()->user()->isFollowing($user)) {
            return back()->with('error', 'You are already following ' . $user->name);
        }
        auth()->user()->follow($user);
        // return to_route('follows')->with('success', 'You are now following ' . $user->username);
        return back()->with('success', 'You are now following ' . $user->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //
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
    public function update(UpdateFollowRequest $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        auth()->user()->follows()
            ->where('followable_id', $user->id)
            ->where('followable_type', get_class($user))
            ->detach(); // Use detach instead of delete for morphToMany relationships

        return redirect()->back()->with('success', 'You are no longer following ' . $user->name);
    }

}
