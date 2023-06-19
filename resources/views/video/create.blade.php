@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">       
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="container mt-4">
            <form method="POST" action="{{route("videosave")}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" class="form-control" 
                    name="email" placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Video Name</label>
                    <input type="text" class="form-control" name="video_name"  placeholder="video Name" required>

                    @if ($errors->has('video_name'))
                        <span class="text-danger text-left">{{ $errors->first('video_name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Video Description</label>
                    <input  
                        type="text" 
                        class="form-control" 
                        name="video_description" 
                        placeholder="Description" required>
                    @if ($errors->has('video_description'))
                        <span class="text-danger text-left">{{ $errors->first('video_description') }}</span>
                    @endif
                </div>                              

                <div class="form-group row">
                    <label for="product_image" class="col-sm-2 col-form-label">Video:</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="video" name="video"
                        required accept="video/*"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save user</button>
               
            </form>
        </div>

    </div>
@endsection