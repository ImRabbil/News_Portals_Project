<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    public function index(){
        $category =DB::table('categories')->get();
        $district =DB::table('districts')->get();
        return view('admin.post.index', compact('category','district'));
    }

    public function GetSubCategory($category_id){
        $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
        return response()->json($sub);

    }

    public function GetSubDistrict($district_id){

        $sub = DB::table('subdistrict')->where('district_id',$district_id)->get();
        return response()->json($sub);

    }
    public function store_post(Request $request)
    {

        $validated = $request->validate([

            'category_id' => 'required',
            'district_id' => 'required',
        ]);
        $data = array();
        $data['title_en']= $request->title_en;
        $data['title_hin']= $request->title_hin;
        $data['user_id']= Auth::id();
        $data['category_id']= $request->category_id;
        $data['subcategory_id']= $request->subcategory_id;
        $data['district_id']= $request->district_id;
        $data['subdistrict_id']= $request->subdistrict_id;
        $data['tags_en']= $request->tags_en;
        $data['tags_hin']= $request->tags_hin;
        $data['details_en']= $request->details_en;
        $data['details_hin']= $request->details_hin;
        $data['headline']= $request->headline;
        $data['first_section']= $request->first_section;
        $data['first_section_thumbnail']= $request->first_section_thumbnail;
        $data['big_thumbnail']= $request->big_thumbnail;
        $data['post_date']= date('d-m-y');
        $data['post_month']= date('M');
      

        $image = $request->image;
        if($image){
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['image']= 'image/postimg/'.$image_one;
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.post')->with($notification);
        }else{
            return redirect()->back();
        }

    }
    public function all_post(){
        $post = DB::table('posts')
                ->join('categories','posts.category_id','categories.id')
                ->join('subcategories','posts.subcategory_id','subcategories.id')
                ->join('districts','posts.district_id','districts.id')
                ->join('subdistrict','posts.subdistrict_id','subdistrict.id')
                ->select('posts.*','categories.category_en','subcategories.subcategory_en','districts.district_en','subdistrict.subdistrict_en')
                ->orderBy('id','desc')->paginate(5);

        return view('admin.post.view_post',compact('post'));

    }

    public function edit_post($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        $district = DB::table('districts')->get();

        return view('admin.post.edit_page',compact('post','category','district'));

    }

    public function update_post(Request $request,$id){

        $data = array();
        $data['title_en']= $request->title_en;
        $data['title_hin']= $request->title_hin;
        $data['user_id']= Auth::id();
        $data['category_id']= $request->category_id;
        $data['subcategory_id']= $request->subcategory_id;
        $data['district_id']= $request->district_id;
        $data['subdistrict_id']= $request->subdistrict_id;
        $data['tags_en']= $request->tags_en;
        $data['tags_hin']= $request->tags_hin;
        $data['details_en']= $request->details_en;
        $data['details_hin']= $request->details_hin;
        $data['headline']= $request->headline;
        $data['first_section']= $request->first_section;
        $data['first_section_thumbnail']= $request->first_section_thumbnail;
        $data['big_thumbnail']= $request->big_thumbnail;
       
        $old_image = $request->image;
        $image = $request->file('image');
        if($image){
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['image']= 'image/postimg/'.$image_one;
            DB::table('posts')->where('id',$id)->update($data);
            unlink($old_image);
            $notification = array(
                'message' => 'Post Upadate Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.post')->with($notification);
        }else{
            // $data['image']= $old_image;
            DB::table('posts')->where('id',$id)->update($data);
            
            $notification = array(
                'message' => 'Post Upadate Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.all.post')->with($notification); 
        }




    }

    public function post_delete($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $old_image = $post->image;
        unlink($old_image);
        DB::table('posts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Post Delete Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.all.post')->with($notification);


    }


}
