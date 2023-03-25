<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index(){
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_en')
                    ->orderBy('id', 'desc')->paginate(4);
      
        return view('admin.subcategory.index', compact('subcategory','category'));
    }

    public function store_subcategory(Request $request)
    {
        $validated = $request->validate([

            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_hin' => 'required|unique:subcategories|max:255',
        ]);
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hin'] = $request->subcategory_hin;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editsubcat($id){
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->where('id',$id)->first();


        return view('admin.subcategory.editsubcat',compact('category','subcategory'));

    }
    public function update_subcategory(Request $request, $id){
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hin'] = $request->subcategory_hin;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.subcategory')->with($notification);



    }
    public function delete_subcategory($id){
        DB::table('subcategories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }
}
