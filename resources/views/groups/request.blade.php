@extends('layouts.app')

@section('content')

          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Friend Request</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                    {{-- Friends Request Detail Start --}}
                   <ul class="request-list list-inline m-0 p-0">
                    @forelse ($requests as $request)
                        @if ($request->status == 'pending')
                            <li class="d-flex align-items-center">
                                <div class="user-img img-fluid"><img src="images/user/05.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                <div class="media-support-info ml-3">
                                    <a href="{{ route('profile', $request->user->username ) }}">
                                        <p class="mb-0 media-body" >{{ $request->user->name }} </p>
                                    </a>
                                    <p class="mb-0">Wants to join your group:</p>
                                    <a href="{{ route('groups.show', $request->group->title) }}">
                                        <h4 class="mb-0">{{ $request->group->title }}</h4>
                                    </a>
                                </div>
                                @if ($request->group->owner_id == auth()->id())
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('groups.accept', $request->id) }}" class="mr-3 btn btn-primary rounded">Accept Request</a>
                                        <a href="{{ route('groups.reject', $request->id) }}" class="mr-3 btn btn-danger rounded">Reject Request</a>
                                    </div>
                                @endif
                            </li>
                            @endif
                    @empty
                        <li class="d-block text-center">
                            <p>No pending requests.</p>
                        </li>
                    @endforelse
                   </ul>
                    {{-- Friends Request Detail End --}}
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">People You May Know</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="request-list m-0 p-0">
                    {{-- Members Detail Start --}}
                    @foreach ($users as $user)

                    <li class="d-flex align-items-center">
                       <div class="user-img img-fluid"><img src="images/user/15.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                       <div class="media-support-info ml-3">
                          <h6>{{ $user->name }}</h6>
                          <p class="mb-0">4  friends</p>
                       </div>
                       <div class="d-flex align-items-center">
                          <a href="javascript:void();" class="mr-3 btn btn-primary rounded"><i class="ri-user-add-line"></i>Add Friend</a>
                          <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Remove</a>
                       </div>
                    </li>
                    @endforeach
                      {{-- Members Details End --}}
                   </ul>
                </div>
             </div>
          </div>
       @endsection


