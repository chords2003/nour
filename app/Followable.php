<?php

namespace App;

use App\Models\User;
use App\Models\Follow;



trait Followable

{

    public function follows()
    {
        return $this->morphToMany(User::class, 'followable', 'follows', 'follower_id', 'followable_id');
    }

    public function follow(User $user)
    {
        //check if the user is already following the user
            if($this->isFollowing($user))
            {
                return true;
            }

        return $this->follows()->save($user,
        [
        'follower_id' => $this->id,
        'followable_id' => $user->id,
        'followable_type' => get_class($user)
        ]);
    }


    public function unfollow(User $user)
    {
        return $this->follows()
            ->where('follower_id', $user->id)
            ->delete();
    }

    // public function follows()
    // {
    //     return $this->morphMany(Follow::class, 'followable');
    // }

    // public function followers()
    // {
    //     return $this->belongsToMany(User::class, 'follows', 'followable_id', 'follower_id')
    //         ->where('followable_type', User::class)
    //         ->withTimestamps();
    // }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followable_id')
            ->where('followable_type', User::class)
            ->withTimestamps();
    }

    public function isFollowing(User $otherUser)
    {
        return $this->follows()
                    ->where('follower_id', $otherUser->id)
                    ->exists();
    }


}
