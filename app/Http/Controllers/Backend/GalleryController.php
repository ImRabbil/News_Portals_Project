<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class GalleryController extends Controller
{
    public function photo_index(){
        $photo = DB::table('photos')->orderBy('id','desc')->paginate(5);
        return view('admin.gallery.photo',compact('photo'));

    }
    public function Store_Photo(Request $request)
    {

        $data = array();
        $data['title']= $request->title;
        $data['type']= $request->type;
        $photo = $request->photo;
        if($photo){
            $image_one = uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(500,300)->save('image/GalleryPhoto/'.$image_one);
            $data['photo']= 'image/GalleryPhoto/'.$image_one;
            DB::table('photos')->insert($data);
            $notification = array(
                'message' => 'Photo Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.photo')->with($notification);
        }else{
            return redirect()->back();
        }

    }
    public function update_photo(Request $request, $id){
        $data = array();
        $data['title']= $request->title;
        $data['type']= $request->type;
        
        $old_image = $request->old_image;
        $photo = $request->file('photo');
        if($photo){
            $image_one = uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(500,300)->save('image/GalleryPhoto/'.$image_one);
            $data['photo']= 'image/GalleryPhoto/'.$image_one;
            DB::table('photos')->where('id',$id)->update($data);
            @unlink($old_image);
            $notification = array(
                'message' => 'Photo Upadate Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.photo')->with($notification);
        }else{
            $data['title']= $request->title;
            $data['type']= $request->type;
            DB::table('photos')->where('id',$id)->update($data);
            
            $notification = array(
                'message' => 'Photo Upadate Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.photo')->with($notification); 
        }

    }

    public function delete($id){
        $photo = DB::table('photos')->where('id', $id)->first();
        $old_image = $photo->photo;
        unlink($old_image);
        DB::table('photos')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Photo Delete Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.all.photo')->with($notification);

    }






    public function video_index(){
        $video = DB::table('videos')->orderBy('id','desc')->paginate(5);
        return view('admin.gallery.video_index',compact('video'));

    }
    public function Add_Video(){
        return view('admin.gallery.add_video');

    }

    public function Store_Video(Request $request){
        $data = array();
        $data['title'] = $request->title;

        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        DB::table('videos')->insert($data);

        $notification = array(
            'message' => ' Video Insert Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.add.videos')->with($notification);

    }

    public function edit_video($id){
        $video = DB::table('videos')->where('id',$id)->first();
        return view('admin.gallery.edit_video',compact('video'));

    }

    
    public function update_video(Request $request, $id){
        $data = array();
        $data['title'] = $request->title;

        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        DB::table('videos')->where('id', $id)->update($data);

        $notification = array(
            'message' => ' Video Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.add.videos')->with($notification);


    }



    public function video_delete($id)
{
    DB::table('videos')->where('id', $id)->delete();

    $notification = array(
        'message' => 'Video Delete Successfully',
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);
}










}
