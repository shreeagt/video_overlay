@extends('layouts.app-master')

@section('content')
    <div>
        <h1>Doctor Details</h1>
        <p>First Name: {{ $doctor->firstname }}</p>
        <p>Last Name: {{ $doctor->lastname }}</p>
        <p>Email: {{ $doctor->email }}</p>
        <p>Contact Number: {{ $doctor->contacno }}</p>
        <p>City: {{ $doctor->city }}</p>
        <p>Clinic Logo:</p>
        @if ($doctor->logo)
            <img src="{{ asset('logos/' . $doctor->logo) }}" alt="Clinic Logo">
        @else
            <p>No logo available.</p>
        @endif
    </div>
@endsection