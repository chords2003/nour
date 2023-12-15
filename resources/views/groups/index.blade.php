@extends('layouts.app')

@section('content')

@forelse ($groups as $group)

<div class="col-md-6 col-lg-4">
    <div class="iq-card">
        <div class="top-bg-image">
            <img src="images/page-img/profile-bg1.jpg" class="img-fluid w-100" alt="group-bg">
        </div>
            <div class="iq-card-body text-center">

                <div class="group-icon">

                    <img src="{{ asset('storage/' . $group->image) }}" alt="group image"
                    class="rounded-circle img-fluid avatar-120">
                </div>

            <div class="group-info pt-3 pb-3">
                <h4><a href="{{ route('groups.show', $group->title) }}">{{ $group->title }}</a></h4>
                <p>{{ $group->description }}</p>
            </div>

            <div class="group-details d-inline-block pb-3">
                <ul class="d-flex align-items-center justify-content-between list-inline m-0 p-0">
                    <li class="pl-3 pr-3">
                    <p class="mb-0">Post</p>
                    <h6>12</h6>
                    </li>
                    <li class="pl-3 pr-3">
                    <p class="mb-0">Member</p>
                    <h6>{{ $membersCount }}</h6>
                    </li>
                    <li class="pl-3 pr-3">
                    <p class="mb-0">Group Owner</p>
                    <h6>{{ $group->owner->name }}</h6>
                    </li>
                </ul>
            </div>
            <div class="group-member d-flex align-items-center">
                <div class="iq-media-group mr-3">
                    @foreach ($group->users as $user )
                   <a href="{{ route('profile', $user->username) }}" class="iq-media">
                   <img class="img-fluid avatar-40 rounded-circle" src="{{ $user->randomavatar }}" alt="">
                   </a>

                   @endforeach
                </div>
             </div>
                @csrf
                <button type="submit" class="btn btn-primary d-block w-100">Join</button>
            </form>
        </div>

    </div>
</div>

@empty
{{-- Add the group button and a message to create a group --}}
{{-- Align the entire Div container to the middle of the page --}}

<div style="display: flex; justify-content: center; align-items:baseline; height: 100vh;">
    <a href="{{ route('groups.create') }}">
        <button type="submit" class="btn btn-primary d-block w-100">
            <i class="ri-add-line pr-2"></i>Create New Group
        </button>
    </a>
</div>

@endforelse

{{-- @if (auth()->user()->groups->count() > 0)
{{-- @endif --}}

<x-flashMessage />
@endsection

