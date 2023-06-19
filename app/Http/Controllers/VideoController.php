<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModel;
use App\Models\User;
use DB;
use Auth;
// use FFMpeg\Filters\Video\VideoFilters;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (Auth::user()->hasRole('admin') ) {
            $videos = VideoModel::select('video.*',"video_user.firstname as videouserfirstname","video_user.lastname as videouserlastname","approvebyuser.firstname as approvebyuserfirstname","approvebyuser.lastname as approvebyuserlastname")
            ->join('mapping_user', 'video.created_by', '=', 'mapping_user.user_id')
            ->join('users as video_user', 'video.created_by', '=','video_user.id')
            ->join('users as approvebyuser', 'video.created_by', '=','approvebyuser.id')            
            ->latest()
            ->paginate(10);
           
        } elseif (Auth::user()->hasRole('so')) {
            $videos = VideoModel::select('video.*')
            ->join('mapping_user', 'video.created_by', '=', 'mapping_user.user_id')
            ->where('mapping_user.mapping_user_id', \Auth::user()->id)
            ->latest()
            ->paginate(10);
        }
       
        return view('video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->input('email');
        $exitemail=User::where(["email"=>$email])->first();
        if(!empty($exitemail)){
            
            $video = $request->file('video');
            // Generate a custom name for the video
            $customName = 'video_' . time() . '.' . $video->getClientOriginalExtension();
            // Store the video in the public folder with the custom name
            // $video->storeAs('public/videos', $customName);    
                           
            $destinationPath = 'uploads/videos';
            $video->move($destinationPath, $customName);
           
            // // Generate a thumbnail image from the video
            // $thumbnailName = 'thumbnail_' . time() . '.jpg';
            // FFMpeg::fromDisk('public')
            //     ->open('videos/' . $customName)
            //     ->getFrameFromSeconds(2) // Adjust the timestamp as needed
            //     ->export()
            //     ->toDisk('public')
            //     ->save('thumbnails/' . $thumbnailName);
            
            $video_insert=VideoModel::create(["video_name"=>$request->input("video_name"),"video_description"=>$request->input("video_description"),"video_path"=>$customName,"created_by"=>$exitemail->id,"created_at"=>date("Y-m-d H:i:s")]);
    
            $request->session()->flash('success', 'Data Insert successfully.');
        }else{
           
            $request->session()->flash('error', 'Invalid Email.');
        }
       
        return redirect()->route('videocreate');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        
       
        $status = $request->input("status");
       
        $video = VideoModel::where("video_id",$id)->first();
        $video->status=$status;
        $video->save();
        // $video->update($input);
       
        return redirect()->route('videoList')
                        ->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
