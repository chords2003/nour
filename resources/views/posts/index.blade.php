

@props(['post'])

{{-- Styling Post card --}}
<style>
    article {
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #ccc;
    }
</style>
@if ($post->count() == 0)
    <h2>No posts yet!</h2>
@else
    <div class="col-sm-12">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="user-post-data">
                    <div class="d-flex flex-wrap">
                        <div class="media-support-user-img mr-3">
                            <img class="rounded-circle img-fluid" src="images/user/01.jpg" alt="">
                        </div>
                        <div class="media-support-info mt-2">
                            <h5 class="mb-0 d-inline-block">
                                <a href="/users/{{ $post->user->username }}">{{ $post->user->name }}</a>
                            </h5>
                            <p class="mb-0 d-inline-block">Add New Post</p>
                            <p class="mb-0 text-primary">
                                {{ $post->created_at->format('l j F ') . '-' }} {{ $post->created_at->ago() }}
                            </p>
                        </div>
                        <div class="iq-card-post-toolbar">
                            <div class="dropdown">
                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" role="button">
                                    <i class="ri-more-fill"></i>
                                </span>
                                <div class="dropdown-menu ">
                                    <a class="dropdown-item p-3" href="/posts/{{ $post->id }}/edit">
                                        @if ($post->user_id == Auth::user()->id)
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                                <div class="data ml-2">
                                                    <h6>Edit Post</h6>
                                                    <p class="mb-0">Update your post and saved items</p>
                                                </div>
                                            </div>
                                            @endif
                                        </a>
                                    <a class="dropdown-item p-3" href="#">
                                        <div class="d-flex align-items-top">
                                            <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                            <div class="data ml-2">
                                                <h6>Hide Post</h6>
                                                <p class="mb-0">See fewer posts like this.</p>
                                            </div>
                                        </div>
                                    </a>
                                    @if ($post->user_id == Auth::user()->id)
                                        {{-- if the post was written by current auth user, then show the delete button --}}
                                        <form action="{{ route('destroy', $post->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this post titled  {{ $post->title }}?')"
                                            {{ Auth::user()->name }}>
                                            @csrf
                                            @method('delete')
                                            <a class="dropdown-item p-3" href="">
                                                <div class="d-flex align-items-top">
                                                    <div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i>
                                                    </div>
                                                    <div class="data ml-2">
                                                        <button style="background-color:rgb(187, 117, 117)"
                                                            class="btn btn-danger btn-sm mb-0" type="submit">
                                                            <p class="mb-0">Remove this post from the Timeline</p>
                                                        </button>
                                                    </div>
                                                </div>
                                            </a>
                                        </form>
                                    @endif
                                    <a class="dropdown-item p-3" href="#">
                                        <div class="d-flex align-items-top">
                                            <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                            <div class="data ml-2">
                                                <h6>Notifications</h6>
                                                <p class="mb-0">Turn on notifications for this post</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <article>
                        <a href="{{ route('posts.show', $post->title) }}">
                            <p style="text-align: center">Mood:</p>
                            <h4 style="text-align: center; color:#1086ed">{{ $post->title }}</h4>
                        </a>
                        <a href="/posts/{{ $post->title }}">
                            @if (!$post->image)
                                {{-- don't render the img tag if there are no images for the post --}}
                            @else
                                {{-- render the post with the image file path --}}
                                <img src="{{ asset('storage/' . $post->image) }}" alt="post-image"
                                    class="img-fluid w-100" />
                                {{-- <img src="{{ asset('storage/' . $post->image) }}" alt="post-image" class="img-fluid w-100" /> --}}
                            @endif
                        </a>
                        @if ($post->user_id == Auth::user()->id)
                            <article style="background-color: #9fd9a9; margin-top:6px;border: 1px solid #15d085">
                                <a href="/posts/{{  $post->title }}">
                                    <h5 style="color: rgb(34, 16, 16); font-style:italic;">{{ $post->body }}</h5>
                                </a>
                            </article>
                        @else
                            <article style="background-color: #1086ed; margin-top:6px">
                                <a href="/posts/{{  $post->title }}">
                                    <h5 style="color: rgb(4, 4, 4);font-style:italic;margin:6px;padding:2px">{{ $post->body }}</h5>
                                </a>
                            </article>
                        @endif
                    </article>
                </div>
                {{-- Possible image collage section --}}
                <div class="comment-area mt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="like-block position-relative d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                @if (Auth::user()->hasNotLikedPost($post) && Auth::user()->id !== $post->user_id)
                                    <form action="{{ route('like',['post' => $post->id])  }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary mr-2">
                                            <i class="ri-thumb-up-line"></i>
                                        </button>
                                    </form>
                                    {{-- if the post was written by current auth user, then don't show the like or unlike button --}}
                                @elseif (Auth::user()->hasLikedPost($post))
                                    <form action="{{ route('unlike', ['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-primary mr-2">
                                            <i class="ri-thumb-down-fill"></i>
                                        </button>
                                        <span>Post liked by you</span>
                                    </form>
                                @else
                                    {{-- if the post was written by current auth user, then don't show the like or unlike button --}}
                                    <span>You own this Post</span>
                                @endif
                                <div class="total-like-block ml-2 mr-3">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" role="button">
                                            @if ($post->likes->count() == 0)
                                                'No likes yet!'
                                            @elseif ($post->likes->count() > 1)
                                                <span>{{ $post->likes->count() }} Likes</span>
                                            @elseif ($post->likes->count() == 1)
                                                <span>{{ $post->likes->count() }} Like</span>
                                            @endif
                                        </span>
                                        @if ($post->likes->count() >= 1)
                                        <div class="total-like-block ml-12 mr-33">
                                            {{-- @foreach ($post->likes as $like)
                                            <div class="dropdown">
                                                        <span class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false" role="button">
                                                            {{ $like->user->name }}
                                                        </span>
                                                    </div>
                                                    @endforeach --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if ($post->comments->count() == 0)
                                <p style="margin-left: 40px;margin-top:16px">No comments yet!</p>
                            @else
                                <div style="margin-left: 30px; text-align:center; margin-bottom:2px"
                                    class="total-comment-block">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" role="button">

                                            ({{ $post->comments->count() }}) Comments
                                        </span>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Max Emum</a>
                                            <a class="dropdown-item" href="#">Bill Yerds</a>
                                            <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                            <a class="dropdown-item" href="#">Tara Misu</a>
                                            <a class="dropdown-item" href="#">Midge Itz</a>
                                            <a class="dropdown-item" href="#">Sal Vidge</a>
                                            <a class="dropdown-item" href="#">Other</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="share-block d-flex align-items-center feather-icon mr-3">
                            <a href="javascript:void();"><i class="ri-share-line"></i>
                                <span class="ml-1">99 Share</span></a>
                        </div>
                    </div>
                    <hr>
                    <ul class="post-comments p-0 m-0">
                        <li>
                            @foreach ($post->comments as $comment)
                                <div class="d-flex flex-wrap">
                                    <div class="user-img">
                                        <img src="/images/user/03.jpg" alt="userimg"
                                            class="avatar-35 rounded-circle img-fluid">
                                    </div>
                                    <div class="comment-data-block ml-3">
                                        <h6>{{ $comment->user->name }}</h6>
                                        <p style="background-color: #ccc;color:black;font:600;border-radius:7px;margin:6px;padding:6px" class="mb-0">{{ $comment->body }}</p>
                                        <div class="d-flex flex-wrap align-items-center comment-activity">
                                            <a href="javascript:void();">like</a>
                                            <a href="javascript:void();">reply</a>
                                            <a href="javascript:void();">translate</a>
                                            <span> {{ $comment->created_at->diffForHumans() }} </span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </li>
                    </ul>
                    <form class="comment-text d-flex align-items-center mt-3"
                        action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <input type="text" name="body" class="form-control rounded" autofocus
                            placeholder="write a comment">
                        <div class="comment-attagement d-flex">
                            <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                            <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a>
                            <a href="javascript:void();"><i class="ri-camera-line mr-3"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
