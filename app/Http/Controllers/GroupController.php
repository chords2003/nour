<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\GroupJoinRequest;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $user = auth()->user();
    //     $followerIds = $user->followers()->pluck('followers.id');
    //     $groups = Group::whereIn('owner_id', $followerIds)->get();

    //     return view('groups.index', [
    //         'groups' => $groups,
    //     ]);
    // }

//     public function index()
// {
//     $user = auth()->user();
//     $isFollowing = $user->isFollowing($user);
//     if ($isFollowing) {
//         $followingIds = $user->isFollowing($user)->pluck('id');
//         $groups = Group::whereIn('owner_id', $followingIds)->get();
//     } else {
//         //return auth user groups
//         $groups = Group::where('owner_id', $user->id)->get();
//     }

//     return view('groups.index', [
//         'groups' => $groups,
//     ]);
// }
// Controller
// public function index() {

//     $user = auth()->user();
//     //create a variable that hold the user's followers
//     // $followers = $user->groups;
//     // dd($followers);
//     // User's own groups
//     $ownGroups = $user->groups;
//     // dd($ownGroups);
//     // Mutual follows
//     $followers = $user->followers;
//     $following = $user->follows;
//     //create a variable that hold who I follow


//     $mutualIds = $followers->pluck('id')->intersect($following->pluck('id'));

//     // Mutual groups
//     $mutualGroups = Group::whereIn('owner_id', $mutualIds)->get();

//     // Merge both results
//     $groups = $ownGroups->merge($mutualGroups);

//     return view('groups.index', [
//        'groups' => $groups,
//     ]);

//   }
public function index(Group $group)
{
    $membersCount = $group->users()->count() + 1; // Add 1 for the group owner
    $user = auth()->user();
    $followerIds = $user->follows()->pluck('users.id')->push($user->id);
    $groups = Group::whereIn('owner_id', $followerIds)->get();

    return view('groups.index', [
        'groups' => $groups,
        'membersCount' => $membersCount,
    ]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    public function acceptJoinRequest(GroupJoinRequest $groupJoinRequest)
    {
        $groupJoinRequest->status = 'accepted';
        $groupJoinRequest->save();
        //Add the user to the group
        $groupJoinRequest->group->users()->attach($groupJoinRequest->user_id);

        return to_route('groups', $groupJoinRequest->group->title)
            ->with('success', $groupJoinRequest->user->name . ', is now a member of the group: *' . $groupJoinRequest->group->title . '*');
        //add the a message with the new user name who recently joined the group

    }

    public function rejectJoinRequest(GroupJoinRequest $groupJoinRequest)
    {
        $groupJoinRequest->status = 'rejected';
        $groupJoinRequest->save();

        return redirect()->route('groups', $groupJoinRequest->group->title)
        ->with('success', $groupJoinRequest->user->name . ', sorry, but your request to join the group: ' . '* ' . $groupJoinRequest->group->title . ' * ' . ' , has been rejected');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $group = new Group;
        // $group->title = $request->title;
        // $group->description = $request->description;
        // $group->save();

        // return redirect('/groups');

        // Validate the form data
     // Validate the form data
     $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Access validated data
    $title = $validatedData['title'];
    $description = $validatedData['description'];

    // Handle image upload if an image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/groups'), $imageName);
        // Save $imageName to the database or use it as needed
    }

    // Use Eloquent to create a new group
    $group = new Group();
    $group->title = $title;
    $group->description = $description;

    // Assuming you have a 'user_id' column in your 'groups' table
    $group->user_id = auth()->id(); // Assuming you have user authentication

    // Assuming you have an 'image' column in your 'groups' table
    if (isset($imageName)) {
        $group->image = 'images/groups/' . $imageName;
    }

    $group->created_at = Carbon::now();  // Use Carbon for timestamps
    $group->updated_at = Carbon::now();

    $group->save();

    return response()->json(['message' => 'Group created successfully']);
    }

    // public function pendingRequests(Group $group)
    // {
    //     $user = auth()->user();
    //     $requests = $user->groupJoinRequests;

    //     return view('groups.request', [
    //         'requests' => $requests,
    //     ]);
    // }

    public function pendingRequests()
{
    $user = auth()->user();
    $requests = GroupJoinRequest::where('status', 'pending')
                ->whereHas('group', function ($query) use ($user) {
                    $query->where('owner_id', $user->id);
                })->with('group')->get();

    return view('groups.request', [
        'requests' => $requests,
    ]);
}

    /**
     * Display the specified resource.
     */
    // public function show(Group $group, Post $post)
    // {
    //     // return view('groups.show')->with('group', $group);
    //     //return the view order by the latest post
    //     return view('groups.show', [
    //         'group' => $group,
    //         //order by the updated at column
    //         // $posts = Post::join('group_user', 'group_user.user_id', '=', 'posts.user_id')

    //         // ->where('group_user.group_id', $group->id)
    //         // ->get()
    //     ]);
    // }

    // public function show(Group $group) {
    //     $posts = Post::fromGroup($group)->get();

    //     return view('groups.show', [
    //       'group' => $group,
    //       'posts' => $posts
    //     ]);
    //   }

    public function show(Group $group)
{
    $posts = Post::join('users', 'users.id', '=', 'posts.user_id')
                 ->join('group_users', 'group_users.user_id', '=', 'users.id')
                 ->where('group_users.group_id', $group->id)
                 ->select('posts.*')
                 ->get();
    $membersCount = $group->users()->count() + 1; // Add 1 for the group owner
    return view('groups.show', [
      'group' => $group,
      'posts' => $posts,
       'membersCount' => $membersCount,
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
