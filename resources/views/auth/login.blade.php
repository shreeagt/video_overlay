@extends('layouts.auth-master')

<style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
        /* background-color: rgb(0, 0, 0); */
        color: #522a6e!important;
        position: relative;
    background-image: url('/assets/images/login_banner.jpeg');
    background-repeat: no-repeat;
    background-position-y: center;
    background-position-x: center;
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;
    z-index: 0;
    padding: 10PX;
}

.text-muted {
    --bs-text-opacity: 1;
    color: #2f255a!important;
}

.text-muted {
  
    color: #522a6e!important;
}
.logo img {
    max-width: 150px;
}

.logo{
    position: absolute;
    bottom: 10px;
    right: 10px;
}

.logo_position {
    right: 10px;
    left: unset;
    top: 10px;
    bottom:unset;
}
/* body.text-center {
    background: #71bbd9;
} */

    main.form-signin {
    min-width: 400px;
    align-items: center;
    background: rgba(255,255,255,0.3);
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 1.2);
    padding: 20px;
    border-radius:20px;
    max-width:500px;
    margin: auto;
    /* margin: auto 20px; */
    /* background: #71bbd9; */
}

.text-muted {
    /* --bs-text-opacity: 1; */
    color: #613665!important;
}

.opti-logo{
    left:10px;
    top:10px;
    right: auto;
}
p.empower-text {
    font-size: 20px;
    color: aliceblue;
}

a.logo.aj-logo {
    left: 10px;
    right: unset;
}

@media screen and (max-width: 768px){
    body {
    background-image: url('/assets/images/login_mob.jpeg');
}

p.empower-text {
    font-size: 14PX;
}
}


@media screen and (max-width: 540px) {   
     main.form-signin {
    min-width: 300px;
}

.logo img {
    max-width: 80px;
}
}

@media screen and (max-width: 300px) {   
     main.form-signin {
    min-width: 250px;
}
}

</style>
@section('content')

<a href="/" class="logo">
    <img src="{{asset('lynx-logo.png')}}">
  </a>

<a href="/" class="logo logo_position">
    <img src="{{asset('assets/images/ajantaone-logo.png')}}">
  </a>

  <a href="#" class="logo opti-logo">
    <img src="{{asset('assets/images/home/optidew_dry_eye.png')}}" >
 </a>
 
<a href="#" class="logo aj-logo">
    <img src="{{asset('assets/images/ajanta-light.png')}}" >
</a>

    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        {{-- <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57"> --}}
        
        <h1 class="h3 mb-3 fw-normal" style="color:#fff">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Employee Id" required="required" autofocus>
            <label for="floatingName">Employee Id</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        {{-- <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
        </div> --}}

        <button class="w-100 btn btn-lg btn-primary" style="max-width:200px" type="submit">Login</button>
        
        @include('auth.partials.copy')
    </form>


@endsection
