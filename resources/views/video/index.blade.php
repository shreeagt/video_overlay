@extends('layouts.app-master')

@section('content')
    
   

    <div class="bg-light p-4 rounded">
        <h1>Video</h1>
        <div class="lead">
            Video List
            {{-- <a href="{{ route('videocreate') }}" class="btn btn-primary btn-sm float-right">Add video</a> --}}
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th >#</th>
                <th >Name</th>
                <th >Description</th>               
                <th >Thubnil</th>
                <th >Status</th>
                @if(Auth::user()->hasRole('so'))
                <th >Action</th>
                @elseif(Auth::user()->hasRole('admin'))
                    <th >Approve By</th>   
                
                @endif    
            </tr>
            </thead>
            <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td >{{ $video->video_id }}</td>
                        <td>{{ $video->video_name}}</td>
                        <td>{{ $video->video_description }}</td>
                        <td>{{ $video->video_path }}</td>
                        <td>{{ $video->status }}</td>
                        
                        <td>
                            @if(Auth::user()->hasRole('so'))
                                @if($video->status=="Pending")
                                    {!! Form::open(['method' => 'patch','route' => ['videoupdate', $video->video_id],'style'=>'display:inline']) !!}
                                    {!! Form::select('status',['Approved' => 'Approved', 'Rejected' => 'Rejected'], null,  ['class' => 'form-control']) !!}
                                    {!! Form::submit('Submit', ['class' => 'btn btn-info btn-sm']) !!}
                                    {!! Form::close() !!}

                                @endif 
                            @elseif(Auth::user()->hasRole('admin'))
                                {{ $video->approvebyuserfirstname." ".$video->approvebyuserlastname }}                   
                            @endif  
                        </td>
                         
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $videos->links() !!}
        </div>

    </div>
@endsection