<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctors;
use App\Models\Videos;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use DB;

class DoctorsController extends Controller
{
    public function create()
    {
        return view('doctors.create');
    }
    public function insertdoctors(Request $request)
   {
    $folderPath = public_path('logos');
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    $idoctor = new Doctors;
    $idoctor->firstname = $request->input('firstname');
    $idoctor->lastname = $request->input('lastname');
    $idoctor->email = $request->input('email');
    $idoctor->contacno = $request->input('contacno');
    $idoctor->city = $request->input('city');

    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move($folderPath, $logoPath);
        $logo = $request->file('logo');
        // $logoPath = $logo->storeAs('logos', 'logo.png');
        
        // Save the file path or URL to your model or database if needed
        $idoctor->logo = $logoPath;
    }
    // Retrieve the soid from the users table and assign it to the soid column of the Doctors model
    $soid = Auth::id();
    $idoctor->soid = $soid;

    $idoctor->save();
    return redirect()->route('doctors.show')->with('success', 'Doctor Successfully added');
    }

    public function showdoctors()
    {
        // Retrieve the currently logged-in user's SO ID
        $soid = Auth::id();

        // Retrieve only the doctors created by the logged-in user
        $doctors = Doctors::where('soid', $soid)->get();

        return view('doctors.show', ['doctors' => $doctors]);
    }
    public function destroy(Doctors $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.show');
    }
    public function edit(Doctors $doctor)
    {
        // Retrieve the doctor from the database and pass it to the view
        return view('doctors.edit', ['doctor' => $doctor]);
    }
    
    public function update(Request $request, Doctors $doctor)
    {
            $folderPath = public_path('logos');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        // Update the doctor's details based on the form input
        $doctor->firstname = $request->input('firstname');
        $doctor->lastname = $request->input('lastname');
        $doctor->email = $request->input('email');
        // $doctor->role = $request->input('role');
        $doctor->contacno = $request->input('contacno');
        $doctor->city = $request->input('city');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($folderPath, $logoPath);
            $doctor->logo = $logoPath;
        }
    // Retrieve the soid from the users table and assign it to the soid column of the Doctors model
    $soid = Auth::id();
    $doctor->soid = $soid;
    
    $doctor->save();
    
        // Redirect the user to the show page or any other appropriate page
        return redirect()->route('doctors.show', ['doctor' => $doctor->id]);
    }
    public function link(Doctors $doctor)
    {
        return view ('home', ['doctor' => $doctor]);
    }
    public function upload(Request $request)
{
    // Validate the file
    $request->validate([
        'video_path' => 'required|mimetypes:video/mp4,video/avi,video/quicktime|max:5242880', // Maximum file size is 5MB
    ]);

    // Create the videos/gallery folder if it doesn't exist
    $folderPath = public_path('videos/gallery');
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }
    //DB::connection()->enableQueryLog();
    // Store the file in the public/videos/gallery folder
    $video = new Videos();
    $video->video_path = $request->file('video_path')->getClientOriginalName(); // Store the original filename in the 'video_path' field
    $request->file('video_path')->move($folderPath, $video->video_path); // Save the video to the public/videos/gallery folder

    // Assign the 'drid' value to the 'drid' column of the 'Videos' model
    $video->drid = $request->dr_id; 
    $video->so_id = $request->so_id; 
    $video->save();
    // $queries = DB::getQueryLog();
    // dd($queries);

    // You can perform additional actions here, such as sending notifications or processing the video further
    return redirect()->back()->with('success', 'Video uploaded successfully.');
}
}
