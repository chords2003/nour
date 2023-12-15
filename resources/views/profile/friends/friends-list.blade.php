@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success" style="border-radius: 10px; w-100" role="alert">
    <p style="color:white; font-size:large;">
        {{ session('success') }}</p>
</div>
@endif
<div class="header-for-bg">
    <div class="background-header position-relative">
       <img src="images/page-img/profile-bg3.jpg" class="img-fluid w-100" alt="header-bg">
       <div class="title-on-header">
          <div class="data-block">
             <h2>Friend Lists</h2>
          </div>

       </div>
    </div>
 </div>

{{-- Loop through all the auth users followers --}}
<div id="content-page" class="content-page">
    <div class="container">
        <div class="row">
            @foreach ($follows as $user)
           <div class="col-md-6">
              <div class="iq-card">
                 <div class="iq-card-body profile-page p-0">
                    <div class="profile-header-image">
                       <div class="cover-container">
                          <img src="images/page-img/profile-bg2.jpg" alt="profile-bg" class="rounded img-fluid w-100">
                       </div>
                       <div class="profile-info p-4">
                          <div class="user-detail">
                             <div class="d-flex flex-wrap justify-content-between align-items-start">
                                <div class="profile-detail d-flex">
                                   <div class="profile-img pr-4">
                                      <img src="images/user/05.jpg" alt="profile-img" class="avatar-130 img-fluid" />
                                   </div>
                                   <div class="user-data-block">
                                    <a href="{{ route('users', $user) }}">
                                        <h4 class="">{{ $user->name }}</h4>
                                    </a>
                                      <h6>@designer</h6>
                                      <p>Lorem Ipsum is simply dummy text of the</p>
                                   </div>
                                </div>
                                @foreach ($groups as $group)
                                <form action="{{ route('groups.request', ['group' => $group->id, 'user' => auth()->user()->id]) }}" method="POST">
                                    @csrf
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">Invite {{ $user->name }} to Group</button>
                                    </form>

                                <form action="{{ route('unfollow', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Unfollow</button>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           @endforeach
        </div>
     </div>
  </div>
@endsection
