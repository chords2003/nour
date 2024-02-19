<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $user = auth()->user();
    //     $totalLikes = $user->likes_count;

    //     return view('index', [
    //         'posts' => Post::orderBy('updated_at', 'desc')->with(['likes'])->paginate(10),
    //         'totalLikes' => $totalLikes,
    //         // 'users' => $user,
    //     ]);
    // }
//Possible N+1 problem solution

public function index()
{
    $user = auth()->user();
    $totalLikes = $user->likes->count();

    // Eager load the user relationship with the posts
    $posts = Post::with(['user', 'comments', 'likes'])->orderBy('updated_at', 'desc')->paginate(10);

    return view('index', [
        'posts' => $posts,
        'totalLikes' => $totalLikes,
        'users' => $user,
    ]);
}

    //create the addMedia method
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request  $request)
    {
        // dd($request->all());
        $request->validate([
            'body' => 'required|max:500',
            'title' => 'required|max:200',
            'image' => 'nullable|mimes:jpg,png,jpeg,mp4,ogx,oga,ogv,ogg,webm|max:4096',
        ]);

        $post = new Post;
        $post->body = $request->body;
        $post->title = $request->title;

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $post->image = $path;
        }
        $post->user_id = auth()->id();
        $post->save();

        // return redirect()->route('index')->with('success','Thank you for your post');
        return to_route('posts.show', ['post' => $post->title])->with('success','Thank you for your post');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    // {
    //     return view('posts.show', compact('post'));
    // }

    public function show(Post $post)
    {
    $post->load(['likes' => function($query) {
        $query->with('user');
    }]);

    return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::find($post->id);
        return view('posts.edit', compact('post'));

        return redirect()->route('index')->with('success', 'Post updated!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        request()->validate([
            'body' => 'required',
            'title' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,mp4,ogx,oga,ogv,ogg,webm|max:4096',
        ]);

        $post = Post::find($id);

        $post->body = request('body');
        $post->title = request('title');

        if(request()->hasFile('image')) {
            $path = request()->file('image')->store('image', 'public');
            $post->image = $path;
        }
        $post->save();

        return redirect()->route('index')->with('success','Your post was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)

    {
        //delete the selected post
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('index')->with('success',  ucfirst(auth()->user()->name) . ", " . 'You have successfully deleted the post with the Mood,' . " *" . $post->title . "*");


    }
    // public function like(Request $request, Post $post)
    // {

    //     $post->likes()->create([
    //         'user_id' => auth()->id(),
    //         'likeable_type' => $request->input('likeable_type')
    //     ]);

    //     return to_route('posts.show', ['post' => $post->id])->with('success','Thanks for liking!!');
    // }

    public function like(Request $request, Post $post) {

        $post->likes()->create([
          'user_id' => auth()->id(),
          'likeable_type' => $request->input('likeable_type')
        ]);

        return to_route('posts.show', $post)->with('success', 'Thanks for liking!');

      }


        //create the hasLikedPost method
    public function hasLikedPost(Post $post)
    {
        return $post->likes->where('user_id', auth()->id())->count() > 0;
    }

    public function unlike($postId)
    {

        $post = Post::find($postId);

        $post->likes()->where('user_id', auth()->id())->delete();

        return redirect()->back();

    }


}
