<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctors;
use App\Models\Videos;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use DB;
use Redirect;



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

    $FolderPath = public_path('photos');
    if (!file_exists($FolderPath)) {
        mkdir($FolderPath, 0777, true);
    }

    $idoctor = new Doctors;
    $idoctor->firstname = $request->input('firstname');
    $idoctor->lastname = $request->input('lastname');
    $idoctor->email = $request->input('email');
    $idoctor->contacno = $request->input('contacno');
    $idoctor->city = $request->input('city');
    $idoctor->speciality = $request->input('speciality');
    $idoctor->mci = $request->input('mci');

    if ($request->input('photo')) {
        // $data = Input::all();
        $png_url = uniqid().'.png';
        $path = public_path()."/" . "photos/" . $png_url;
        $img = $request->input('photo');//$data['photo'];
        $img = substr($img, strpos($img, ",")+1);
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        // Save the file path or URL to your model or database if needed
        $idoctor->photo = "/" . "photos/" . $png_url;
    }

    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $logoPath = $logo->getClientOriginalExtension();
        $logoName = uniqid().'.'.$logoPath;
        $logo->move($folderPath, $logoName);
        
        // Save the file path or URL to your model or database if needed
        $idoctor->logo = $logoName;
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

        $FolderPath = public_path('photos');
        if (!file_exists($FolderPath)) {
            mkdir($FolderPath, 0777, true);
        }
        // Update the doctor's details based on the form input
        $doctor->firstname = $request->input('firstname');
        $doctor->lastname = $request->input('lastname');
        $doctor->email = $request->input('email');
        // $doctor->role = $request->input('role');
        $doctor->contacno = $request->input('contacno');
        $doctor->city = $request->input('city');
        // $doctor->speciality = $request->input('speciality');
        $doctor->mci = $request->input('mci');


        if ($request->has('speciality')) {
            $doctor->speciality = $request->input('speciality');
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->getClientOriginalExtension();
            $photoName = uniqid().'.'.$photoPath;
            $photo->move($FolderPath, $photoName);
            
            // Save the file path or URL to your model or database if needed
            $doctor->photo = $photoName;
        }
    
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->getClientOriginalExtension();
            $logoName = uniqid().'.'.$logoPath;
            $logo->move($folderPath, $logoName);
            
            // Save the file path or URL to your model or database if needed
            $doctor->logo = $logoName;
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

    $extension = $request->file('video_path')->getClientOriginalExtension();

    // Store the file in the public/videos/gallery folder
    $video = new Videos();
    $video->video_path = uniqid().'.'.$extension;
    $request->file('video_path')->move($folderPath, $video->video_path);


    // Assign the 'drid' and 'so_id' values to the respective columns of the 'Videos' model
    $video->drid = $request->dr_id; 
    $video->so_id = $request->so_id; 
    

    $video->save();

    // Redirect to another page with the doctor's details
    // header("Location: /script_optidew.php?video_id=".$video->id);
    // die();

    return redirect('/video/'.$video->id)->header('refresh', '5');

}
    public function showvideo($id)
    {
        // Retrieve the video details from the database based on the $video_id
        $video = Videos::findOrFail($id);
    
        // Pass the video details to the view
        return view('show_video', compact('video'));
    }
    public function trimvideo(Request $request, $id)
{
    $validatedData = $request->validate([
        'starttime' => 'required',
        'endtime' => 'required',
    ]);

    $video = Videos::findOrFail($id);
    $video->starttime = $validatedData['starttime'];
    $video->endtime = $validatedData['endtime'];
    
    $video->save();
    return Redirect::to("script_optidew.php?video_id=".$id);
    // header("Location: script_optidew.php?video_id=".$id);
}
    
}
