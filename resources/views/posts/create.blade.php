

@props(['post'])
{{-- Create the modal for the post --}}

<div id="post-modal-data" class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Create Post</h4>
          <div>
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        </div>
       </div>
    </div>
    <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
       <div class="d-flex align-items-center">
          <div class="user-img">
             <img src="/images/user/1.jpg" alt="userimg" class="avatar-60 rounded-circle img-fluid">
          </div>
          {{-- Create the create form for the posts--}}

          <form class="post-text ml-3 w-100" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <input
                    type="text"
                    class="form-control rounded @error('title') is-invalid @enderror"
                    placeholder=" {{ ucfirst(Auth::user()->username )}}, how are you feeling today?..."
                    name="title"
                    value="{{ old('title') }}"
                    style="border: 0px 0px 1px rgb(46, 136, 215);"
                    required
                    autofocus
                    >
                    @error('title')
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input
                    type="text"
                    class="form-control rounded"
                    placeholder="{{ ucfirst(Auth::user()->username) }}, describe what you would like to share..."
                    name="body"
                    value="{{ old('body') }}"
                    style="border: 0px 0px 1px rgb(150, 46, 215);"
                    required
                    >
                    @error('body')
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input
                    type="file"
                    class="iq-bg-primary rounded p-2 pointer mr-3" src="/images/small/07.png"
                    name="image" id="image">
                    @error('image')
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
             <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button>
            </form>
       </div>
       <hr>
    </div>
 </div>

