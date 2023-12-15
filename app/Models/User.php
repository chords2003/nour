<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// use App\Followable;
use App\Followable;

use App\Models\Like;
use App\Models\Post;
use App\Models\PostComment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $dispatchesEvents = [
        'followed' => \App\Jobs\FollowsBack::class
    ];

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
    ];


    /** @var \App\Models\User $user */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //create a method that count the total post the user liked
    public function totalLikes()
    {
        return $this->hasMany(Like::class)->count();
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
    public function hasLikedPost(Post $post)
    {
        return $post->likes->where('user_id', auth()->id())->count() > 0;
    }

    //creat a hasNotLikedPost by auth user method
    public function hasNotLikedPost(Post $post)
    {
        return $post->likes->where('user_id', auth()->id())->count() == 0;
    }

    // Define the inverse of the relationship for followers
    // public function followers()
    // {
    //     return $this->morphMany(Follow::class, 'followable');
    // }

//     public function followers()
// {
//     return $this->morphToMany(User::class, 'followable', 'follows', 'followable_id', 'follower_id');
// }

// public function unfollow($user)
// {
//     return $this->follows()
//         ->where('follower_id', $user instanceof User ? $user->id : $user)
//         ->delete();
// }


    public function getRouteKeyName()
    {
        return 'username';
    }

    // public function getAvatarAttribute($value)
    // {
    //     return asset($value ?: '/images/default-avatar.jpeg');
    // }
    public function getAvatarAttribute($value)
    {
        if ($value)
        {
            return asset($value);
        }

    return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    public function getRandomAvatarAttribute($value)
    {
        // $avatar = "https://ui-avatars.com/api/";
        return asset($value ?: 'https://i.pravatar.cc/300/?name=' . urlencode($this->name));
    }

    public function getBannerAttribute($value)
    {
        return asset($value ?: '/images/default-profile-banner.jpg');
    }


    //fix this issue later
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_users', 'user_id', 'group_id');
    }

    public function groupJoinRequests()
    {
        return $this->hasMany(GroupJoinRequest::class);
    }
}

