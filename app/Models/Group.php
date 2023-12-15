<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_users');
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->latest();
    }

    //create a method that group users posts
    public function groupUserPosts()
    {
        return $this->hasManyThrough(Post::class, GroupUser::class);
    }

    public function joinRequests()
    {
        return $this->hasMany(GroupUser::class)->where('accepted', false);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }




}
