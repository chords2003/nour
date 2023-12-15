<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['body','title','slug', 'media'];

    // Post model

public static function findOrFail($id)
{

    $post = self::find($id);

    if (!$post) {
       abort(404);
    }

    return $post;

  }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    //create a belongsToUser method to check if a post belongs to a user
    public function belongsToUser(User $user)
    {
        return $this->user->is($user);
    }

     // Define the inverse of the relationship for followers
     public function followers()
     {
         return $this->morphMany(Follow::class, 'followable');
     }



    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function scopeFromGroup($query, Group $group)
    {
    return $query->select('posts.*')
        ->join('group_users', 'group_users.user_id', '=', 'posts.user_id')
        ->where('group_users.group_id', $group->id);
    }



}
