<?php
 
namespace App\Http\Controllers;
 
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class VideoController extends Controller

{
    
public function getVideoUploadForm(){
    return view('video-upload');
    
}
//отображение видео на странице
public function uploadVideo(Request $request)
{
    $this->validate ($request, [
        'title' => 'required|string|max:255',
        'video' => 'required|file|mimetypes:video/mp4',
    ]);
    $fileName = $request->video->getClientOriginalName();
    $filePath = 'videos/' . $fileName;

    $isFileUploaded = Storage::disk('public')->url($filePath);

    if($isFileUploaded){
        $video = new Video();
        $video->title=$request->title;
        $video->path = $filePath;
        $video->save();

        return back()
        ->with('success, video upload');
        
    }
    //видимость файла
$path = $request->file('video')->storePublicly('video', 's3');
 
$path = $request->file('video')->storePubliclyAs(
    'video',
    $request->user()->id,
    's3'
);
    return back()
    ->with('error');
}
}
return redirect('fetch_video');
