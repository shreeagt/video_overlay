@extends('layouts.app-master')

@section('content')
<style>
    label.cabinet{
	display: block;
	cursor: pointer;
}

label.cabinet input.file{
	position: relative;
	height: 100%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
  filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
  margin-top:-30px;
}

#upload-demo{
	width: 340px;
	height: 340px;
  padding-bottom:15px;
}
</style>
<div class="bg-light p-4 rounded">
        <h1>Edit Doctors</h1>
        <div class="lead">
            Edit Doctors.
        </div>

        <div class="container mt-4">
        <form action="{{ route('doctors.update', ['doctor' => $doctor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="firstname">Dr. Name:</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $doctor->firstname }}">
            </div>
            <div class="form-group">
                <label for="lastname">Clinic Name:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $doctor->lastname }}">
            </div>
            <div class="form-group">
                <label for="contacno">Contact No</label>
                <input type="contacno" name="contacno" id="contacno" class="form-control" value="{{ $doctor->contacno }}">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="city" name="city" id="city" class="form-control" value="{{ $doctor->city }}">
            </div>
            <div class="form-group">
                <label for="speciality">Speciality</label>
                <input type="text" name="speciality" id="speciality" class="form-control" value="{{ $doctor->speciality }}">
            </div>
            {{-- <div class="mb-3">
                <label for="speciality" class="form-label">Contact No</label>
                <input value="{{ old('speciality') }}" 
                    type="text" 
                    class="form-control" 
                    name="speciality" 
                    placeholder="Speciality" >
                @if ($errors->has('speciality'))
                    <span class="text-danger text-left">{{ $errors->first('speciality') }}</span>
                @endif
            </div> --}}
            {{-- <div class="form-group">
                <label for="speciality">Speciality</label>
                <select name="speciality" id="speciality" class="form-control">
                    <option value="">Select Speciality</option>
                    <option value="General Opthalmologist" {{ $doctor->speciality == 'General Opthalmologist' ? 'selected' : '' }}>General Ophthalmologist</option>
                    <option value="Retina Specialist" {{ $doctor->speciality == 'Retina Specialist' ? 'selected' : '' }}>Retina Specialist</option>
                    <option value="Cornea Specialist" {{ $doctor->speciality == 'Cornea Specialist' ? 'selected' : '' }}>Cornea Specialist</option>
                    <option value="Glaucoma Specialist" {{ $doctor->speciality == 'Glaucoma Specialist' ? 'selected' : '' }}>Glaucoma Specialist</option>
                    <option value="Optometrist" {{ $doctor->speciality == 'Optometrist' ? 'selected' : '' }}>Optometrist</option>
                </select>
            </div> --}}
            <div class="form-group">
                <label for="mci">Doctors Code</label>
                <input type="mci" name="mci" id="mci" class="form-control" value="{{ $doctor->mci }}">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control" value="logo">
            </div>
            {{-- <div class="form-group">
                <label for="photo">Dr. Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" value="photo">
            </div> --}}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $doctor->email }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Dr. Photo</label>
                    <input value="{{ old('photo') }}" 
                    type="hidden" 
                    class="form-control" 
                    name="photo" 
                    id="photo-cropped"
                    placeholder="Logo" required>
                @if ($errors->has('photo'))
                    <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                @endif
            </div>
           

            {{-- new lines  --}}

            <!-- partial:index.partial.html -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <label class="cabinet center-block">
                        <figure>
                            <img src="" class="gambar img-responsive img-thumbnail" name="croppedPhoto" id="item-img-output" />
                            <figcaption><i class="fa fa-camera"></i></figcaption>
                    </figure>
                        <input type="file" class="item-img file center-block" name="file_photo"/>
                    </label>
                </div>
            </div>
            
        </div>

<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <div id="upload-demo" class="center-block"></div>
                  </div>
                         <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
  </div>
                        </div>
                      </div>
                    </div>
            <!-- <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $doctor->role }}">
            </div> -->
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>

    </div>


@endsection
