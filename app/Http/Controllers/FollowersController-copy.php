<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Followers;
use App\Http\Requests\StoreFollowersRequest;
use App\Http\Requests\UpdateFollowersRequest;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $followers = $user->followers;
        $following = $user->follows;
        // dd($followers);
        return view('profile.friends.friends-list', [
            'followers' => $followers,
            'following' => $following,
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
    public function store(StoreFollowersRequest $request, User $user)
{
    auth()->user()->follows($user);
    return redirect()->route('followers')->with('success', 'You are now following ' . $user->name);
}

    /**
     * Display the specified resource.
     */
    public function show(Followers $followers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Followers $followers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFollowersRequest $request, Followers $followers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Followers $followers)
    {
        //
    }
}
