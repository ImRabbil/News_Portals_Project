<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->orderBy('id', 'desc')->paginate(3);
        return view('admin.category.index', compact('category'));
    }

    public function store_category(Request $request)
    {
        $validated = $request->validate([

            'category_en' => 'required|unique:categories|max:255',
            'category_hin' => 'required|unique:categories|max:255',
        ]);
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_hin'] = $request->category_hin;
        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update_category(Request $request, $id)
    {
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_hin'] = $request->category_hin;
        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

   
}
