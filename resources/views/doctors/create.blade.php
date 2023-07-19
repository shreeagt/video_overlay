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
        <h1>Add Doctors</h1>
        <div class="lead">
            Add Doctors and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="firstname" class="form-label">Dr.Name</label>
                    <input value="{{ old('firstname') }}" 
                        type="text" 
                        class="form-control" 
                        name="firstname" 
                        placeholder="Dr. Name" required>

                    @if ($errors->has('firstname'))
                        <span class="text-danger text-left">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Clinic Name</label>
                    <input value="{{ old('lastname') }}" 
                        type="text" 
                        class="form-control" 
                        name="lastname" 
                        placeholder="Clinic Name" required>
                    @if ($errors->has('lastname'))
                        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>

                <!-- <div class="mb-3">
                    <label for="name" class="form-label">Password</label>
                    <input value="{{ old('password') }}" 
                        type="text" 
                        class="form-control" 
                        name="password" 
                        placeholder="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div> -->

               
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <!-- <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="select_role">Select Role</option>
                        <option value="doctor">Doctor</option>
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div> -->

                <div class="mb-3">
                    <label for="contacno" class="form-label">Contact No</label>
                    <input value="{{ old('contacno') }}" 
                        type="text" 
                        class="form-control" 
                        name="contacno" 
                        placeholder="Contact No" required>
                    @if ($errors->has('contacno'))
                        <span class="text-danger text-left">{{ $errors->first('contacno') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="speciality" class="form-label">Speciality</label>
                    <input value="{{ old('speciality') }}" 
                        type="text" 
                        class="form-control" 
                        name="speciality" 
                        placeholder="Speciality" required>
                    @if ($errors->has('speciality'))
                        <span class="text-danger text-left">{{ $errors->first('speciality') }}</span>
                    @endif
                </div>

                {{-- <div class="mb-3">
                    <label for="speciality" class="form-label">Speciality</label>
                    <select class="form-control" name="speciality" >
                        <option value="">Select Speciality</option>
                        <option value="General Opthalmologist" {{ old('speciality') == 'General Ophthalmologist' ? 'selected' : '' }}>General Ophthalmologist</option>
                        <option value="Retina Specialist" {{ old('speciality') == 'Retina Specialist' ? 'selected' : '' }}>Retina Specialist</option>
                        <option value="Cornea Specialist" {{ old('speciality') == 'Cornea Specialist' ? 'selected' : '' }}>Cornea Specialist</option>
                        <option value="Glaucoma Specialist" {{ old('speciality') == 'Glaucoma Specialist' ? 'selected' : '' }}>Glaucoma Specialist</option>
                        <option value="Optometrist" {{ old('speciality') == 'Optometrist' ? 'selected' : '' }}>Optometrist</option>

                    </select>
                    @if ($errors->has('speciality'))
                        <span class="text-danger text-left">{{ $errors->first('speciality') }}</span>
                    @endif
                </div> --}}

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input value="{{ old('city') }}" 
                        type="text" 
                        class="form-control" 
                        name="city" 
                        placeholder="City" required>
                    @if ($errors->has('city'))
                        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="mci" class="form-label">Doctors Code</label>
                    <input value="{{ old('mci') }}" 
                        type="text" 
                        class="form-control" 
                        name="mci" 
                        placeholder="Doctors Code" required>
                    @if ($errors->has('mci'))
                        <span class="text-danger text-left">{{ $errors->first('mci') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">Clinic Logo</label>
                    <input value="{{ old('logo') }}" 
                        type="file" 
                        class="form-control" 
                        name="logo" 
                        placeholder="Logo" required>
                    @if ($errors->has('logo'))
                        <span class="text-danger text-left">{{ $errors->first('logo') }}</span>
                    @endif
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
                





                <button type="submit" class="btn btn-primary">Save Doctor</button>
            </form>
        </div>

    </div>



@endsection

