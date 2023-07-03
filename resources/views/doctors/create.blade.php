@extends('layouts.app-master')

@section('content')
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
                    <label for="lastname" class="form-label">Clnic Name</label>
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
                    <select class="form-control" name="speciality" required>
                        <option value="">Select Speciality</option>
                        <option value="General Opthamologist" {{ old('speciality') == 'General Opthamologist' ? 'selected' : '' }}>General Opthamologist</option>
                        <option value="Retina Specialist" {{ old('speciality') == 'Retina Specialist' ? 'selected' : '' }}>Retina Specialist</option>
                        <option value="Cornea Specialist" {{ old('speciality') == 'Cornea Specialist' ? 'selected' : '' }}>Cornea Specialist</option>
                        <option value="Glaucoma Specialist" {{ old('speciality') == 'Glaucoma Specialist' ? 'selected' : '' }}>Glaucoma Specialist</option>
                    </select>
                    @if ($errors->has('speciality'))
                        <span class="text-danger text-left">{{ $errors->first('speciality') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input value="{{ old('city') }}" 
                        type="text" 
                        class="form-control" 
                        name="city" 
                        placeholder="Speciality" required>
                    @if ($errors->has('city'))
                        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="mci" class="form-label">MCI Registration Number</label>
                    <input value="{{ old('mci') }}" 
                        type="text" 
                        class="form-control" 
                        name="mci" 
                        placeholder="MCI Registration Number" required>
                    @if ($errors->has('mci'))
                        <span class="text-danger text-left">{{ $errors->first('mci') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">CLinic Logo</label>
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
                        type="file" 
                        class="form-control" 
                        name="photo" 
                        placeholder="Logo" required>
                    @if ($errors->has('photo'))
                        <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
               

                <button type="submit" class="btn btn-primary">Save Doctor</button>
            </form>
        </div>

    </div>
@endsection