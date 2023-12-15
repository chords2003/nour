@extends('layouts.app')
@section('content')
<div class="header-for-bg">
    <div class="background-header position-relative">
       <img src="/images/page-img/profile-bg7.jpg" class="img-fluid w-100 rounded " alt="header-bg">
       <div class="title-on-header">
          <div class="data-block">
             <h2>Groups</h2>
          </div>
       </div>
    </div>
 </div>

 {{-- Page Content  --}}

 <div id="content-page" class="content-page">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="group-info d-flex align-items-center">
                   <div class="mr-3">
                      <img class="rounded-circle img-fluid avatar-100" src="/images/page-img/gi-1.jpg" alt="">
                   </div>
                   <div class="info">
                      <h4>{{ $group->title }}</h4>
                      <p class="mb-0"><i class="ri-lock-fill pr-2"></i>Private Group . {{ $membersCount}} members</p>
                   </div>
                </div>
                <div class="group-member d-flex align-items-center">
                   <div class="iq-media-group mr-3">
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/05.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/06.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/07.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/08.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/09.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/10.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/11.jpg" alt="">
                      </a>
                      <a href="#" class="iq-media">
                      <img class="img-fluid avatar-40 rounded-circle" src="/images/user/12.jpg" alt="">
                      </a>
                   </div>
                   <button type="submit" class="btn btn-primary mb-2"><i class="ri-add-line"></i>Invite</button>
                </div>
             </div>
          </div>
          <div class="col-lg-8">

            {{-- Post create form --}}
            @include('posts.create')
             <div class="iq-card">
                <div class="iq-card-body">
                    @foreach ($group->users as $user )
                        @foreach ($posts as $post )


                        <div class="post-item">
                        <div class="user-post-data p-3">
                            <div class="d-flex flex-wrap">
                                <div class="media-support-user-img mr-3">
                                    <img class="rounded-circle img-fluid" src="/images/user/04.jpg" alt="">
                                </div>
                                <div class="media-support-info mt-2">
                                    <h5 class="mb-0 d-inline-block"><a href="{{ route('profile', $user->username) }}" class="">{{ $user->name }}</a></h5>
                                    <p class="mb-0">{{ $user->updated_at->diffForHumans() }}</p>
                                </div>
                                <div class="iq-card-post-toolbar">
                                    <div class="dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                    <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu m-0 p-0">
                                        <a class="dropdown-item p-3" href="#">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                                <div class="data ml-2">
                                                <h6>Save Post</h6>
                                                <p class="mb-0">Add this to your saved items</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item p-3" href="#">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                                <div class="data ml-2">
                                                <h6>Edit Post</h6>
                                                <p class="mb-0">Update your post and saved items</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item p-3" href="#">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                                <div class="data ml-2">
                                                <h6>Hide From Timeline</h6>
                                                <p class="mb-0">See fewer posts like this.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item p-3" href="#">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i></div>
                                                <div class="data ml-2">
                                                <h6>Delete</h6>
                                                <p class="mb-0">Remove thids Post on Timeline</p>
                                                </div>
                                            </div>
                                        </a>
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
                        @if (!$post->count())
                            <h2 class="text-center">This group have yet to Posts anything!</h2>
                        @else

                            <div class="mt-3">
                                <article style="border-radius: 10px; border: 1px solid rgb(193, 214, 193)">
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <p style="text-align: center">Mood:</p>
                                        <h4 style="text-align: center; color:#1086ed">{{ $post->title }}</h4>
                                    </a>
                                    <div style="margin:10px;border-radius:10px; width:auto;flex:justify-center">
                                        <a href="/posts/{{ $post->title }}">
                                            @if (!$post->image)
                                                {{-- don't render the img tag if there are no images for the post --}}
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="post-image"
                                                    class="img-fluid w-100" />

                                                {{-- render the post with the image file path --}}
                                                {{-- <img src="{{ asset('storage/' . $post->image) }}" alt="post-image" class="img-fluid w-100" /> --}}
                                            </a>
                                        </div>
                                        @else
                                        <div style="margin:10px;border-radius:10px; width:auto;flex:justify-center">
                                            <a href="/posts/{{ $post->title }}">
                                                {{-- don't render the img tag if there are no images for the post --}}
                                                {{-- render the post with the image file path --}}
                                                {{-- <img src="{{ asset('storage/' . $post->image) }}" alt="post-image" class="img-fluid w-100" /> --}}
                                            </a>
                                        </div>
                                        @endif
                                    @if ($post->user_id == Auth::user()->id)
                                        <article style="background-color: #9fd9a9;border: 1px solid #15d085; margin:10px;margin-left:5px; border-radius:10px">
                                            <a href="/posts/{{  $post->title }}">

                                                <h5 style="color: rgb(34, 16, 16); font-style:italic; margin:3px">{{ $post->body }}</h5>
                                            </a>
                                        </article>
                                    @else
                                        <article style="background-color: #1086ed">
                                            <a href="/posts/{{  $post->title }}">
                                                <h5 style="color: rgb(4, 4, 4); font-style:italic;margin:3px">{{ $post->body }}</h5>
                                            </a>
                                        </article>
                                    @endif
                                </article>
                            </div>

                            <div class="comment-area mt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="like-block position-relative d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                        <div class="like-data">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                <img src="/images/icon/01.png" class="img-fluid" alt="">
                                                </span>
                                                <div class="dropdown-menu">
                                                    <a class="ml-2 mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like"><img src="/images/icon/01.png" class="img-fluid" alt=""></a>
                                                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Love"><img src="/images/icon/02.png" class="img-fluid" alt=""></a>
                                                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Happy"><img src="/images/icon/03.png" class="img-fluid" alt=""></a>
                                                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="HaHa"><img src="/images/icon/04.png" class="img-fluid" alt=""></a>
                                                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Think"><img src="/images/icon/05.png" class="img-fluid" alt=""></a>
                                                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sade"><img src="/images/icon/06.png" class="img-fluid" alt=""></a>
                                                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lovely"><img src="/images/icon/07.png" class="img-fluid" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total-like-block ml-2 mr-3">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                140 Likes
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
                                        </div>
                                        <div class="total-comment-block">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                            20 Comment
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
                                    </div>
                                    <div class="share-block d-flex align-items-center feather-icon mr-3">
                                        <a href="javascript:void();"><i class="ri-share-line"></i>
                                        <span class="ml-1">99 Share</span></a>
                                    </div>
                                </div>
                                <hr>
                                <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                    <input type="text" class="form-control rounded">
                                    <div class="comment-attagement d-flex">
                                        <a href="javascript:void();"><i class="ri-link mr-3"></i></a>
                                        <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a>
                                        <a href="javascript:void();"><i class="ri-camera-line mr-3"></i></a>
                                    </div>
                                </form>
                            </div>
                        @endif
                        </div>
                        @endforeach
                    @endforeach
                   {{-- User Post Item --}}
                </div>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="iq-card-title">Groups</h4>
                   </div>
                   <div class="iq-card-post-toolbar">
                      <div class="dropdown">
                         <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                         <i class="ri-more-fill"></i>
                         </span>
                         <div class="dropdown-menu m-0 p-0">
                            <a class="dropdown-item p-3" href="#">
                               <div class="d-flex align-items-top">
                                  <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                  <div class="data ml-2">
                                     <h6>Notifications</h6>
                                     <p class="mb-0">Turn on notifications for this post</p>
                                  </div>
                               </div>
                            </a>
                            <a class="dropdown-item p-3" href="#">
                               <div class="d-flex align-items-top">
                                  <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                  <div class="data ml-2">
                                     <h6>Pins</h6>
                                     <p class="mb-0">Pin your favourite groups for quick access.</p>
                                  </div>
                               </div>
                            </a>
                            <a class="dropdown-item p-3" href="#">
                               <div class="d-flex align-items-top">
                                  <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                  <div class="data ml-2">
                                     <h6>Following</h6>
                                     <p class="mb-0">Follow or unfollow groups to control what you see in News Feed.</p>
                                  </div>
                               </div>
                            </a>
                            <a class="dropdown-item p-3" href="#">
                               <div class="d-flex align-items-top">
                                  <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                  <div class="data ml-2">
                                     <h6>Membership</h6>
                                     <p class="mb-0">Leave groups that no longer interest you.</p>
                                  </div>
                               </div>
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="list-inline p-0 m-0">
                      <li class="mb-3 pb-3 border-bottom">
                         <div class="iq-search-bar members-search p-0">
                            <form action="#" class="searchbox w-auto">
                               <input type="text" class="text search-input bg-grey" placeholder="Type here to search...">
                               <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            </form>
                         </div>
                      </li>
                      <li class="mb-3 d-flex align-items-center">
                          <div class="avatar-40 rounded-circle bg-grey text-center mr-3"><i class="ri-bank-card-line font-size-20"></i></div>
                         <h6 class="mb-0">Your Feed</h6>
                      </li>
                      <li class="mb-3 d-flex align-items-center">
                         <div class="avatar-40 rounded-circle bg-grey text-center mr-3"><i class="ri-compass-3-line font-size-20"></i></div>
                         <h6 class="mb-0">Discover</h6>
                      </li>
                      <li>
                        <a href="{{ route('groups.create') }}">
                         <button type="submit" class="btn btn-primary d-block w-100"><i
                            class="ri-add-line pr-2">
                            </i>Create New Group
                        </button>
                        </a>
                      </li>
                   </ul>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="iq-card-title">About</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="list-inline p-0 m-0">
                      <li class="mb-3">
                         <h4 class="mb-0">{{ $group->title }}</h4>
                      </li>
                      <li class="mb-3">
                         <h6><i class="ri-lock-fill pr-2"></i>Private</h6>
                         <p class="mb-0 pl-4">Group Owned by:</p> <h5> <a href="{{ route('profile', $group->owner) }}">{{ $group->owner->name }}</a></h5>
                      </li>
                      <li class="mb-3">
                         <h6><i class="ri-eye-fill pr-2"></i>Visible</h6>
                         <p class="mb-0 pl-4">Various versions have evolved over the years</p>
                      </li>
                      <li class="">
                         <h6><i class="ri-group-fill pr-2"></i>General group</h6>
                         <p class="mb-0 pl-4">There are many variations of passages</p>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
