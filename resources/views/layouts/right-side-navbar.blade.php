

{{--Only display if there are non-member friends avalable. Add a message no Non-friend member available to choose --}}


<div class="right-sidebar-mini right-sidebar">
    <div class="right-sidebar-panel p-0">
        <div class="iq-card shadow-none">
            <div class="iq-card-body p-0">
                <div class="media-height p-3">
                    @forelse ($users as $user)
                        @if (!auth()->user()->follows()->where('followable_id', $user->id)->exists() && $user->id !== auth()->user()->id)
                            <form action="{{ route('follow', $user) }}" method="POST">
                                <div class="media align-items-center mb-4">
                                    {{-- Add the form to follow user --}}
                                    @csrf
                                    <div class="iq-profile-avatar status-online">
                                        {{-- use the avatar method from the User Model to get a user avatar --}}
                                        <img class="rounded-circle avatar-50" src="{{ $user->randomAvatar }}"
                                            alt="">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0"><a
                                                href="{{ route('users', $user->username) }}">{{ $user->name }}</a>
                                        </h6>
                                        {{-- Add the follow button to follow the user --}}
                                        <button class="btn btn-primary btn-sm">Follow me</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @empty
                        <p>No non-friends members available.</p>
                    @endforelse
                </div>
            </div>

            <div class="right-sidebar-toggle bg-primary mt-3">
                <i class="ri-arrow-left-line side-left-icon"></i>
                <i class="ri-arrow-right-line side-right-icon"><span class="ml-3 d-inline-block">Close Menu</span></i>
            </div>
        </div>
    </div>
</div>

