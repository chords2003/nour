<?php

namespace App;

use App\Models\User;
use App\Models\Follow;



trait Followable
{

    public function follow(User $user)
    {

        // Attach follower
        $this->followers()->attach($user->id);

        // Dispatch the event
        event(new Follow([$this, $user]));

      }

    // //create a method that returns the users followers
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follow_id',
            'user_id');
    }


    public function isFollowing(User $user)
    {
        return $this->follows->contains($user);
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'followers',
            'user_id',
            'follower_id'
        );
    }

}
