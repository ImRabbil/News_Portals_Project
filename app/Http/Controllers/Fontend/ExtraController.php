<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    public function English()
    {
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'english');
        return redirect()->back();
    }
    public function Hindi()
    {
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'hindi');
        return redirect()->back();
    }

    public function SinglePost($id)
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
            ->join('users', 'posts.user_id', 'users.id')
            ->select('posts.*', 'categories.category_en', 'categories.category_hin', 'subcategories.subcategory_en', 'subcategories.subcategory_hin', 'users.name')
            ->where('posts.id', $id)
            ->first();
        return view('fontend.pages.single', compact('post'));
    }

    public function CategoryPost($id, $category_en)
    {
        $cat = DB::table('posts')
            // ->join('categories', 'posts.category_id', 'categories.id')
            // ->select('posts.*', 'categories.category_en')

            ->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('fontend.pages.allcat', compact('cat'));
        // return $cat;

    }
    public function SubCategoryPost($id, $subcategory_en)
    {
        $subcat = DB::table('posts')
            ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
            ->select('posts.*', 'subcategories.subcategory_en')

            ->where('subcategory_id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('fontend.pages.allsubcat', compact('subcat'));
        // return $subcat;

    }

    public function GetSubDistrict($district_id)
    {

        $sub = DB::table('subdistrict')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    public function Searching(Request $request){
        $distric = $request->district_id;
        $subdistric = $request->subdistrict_id;
        $cat = DB::table('posts')
            ->where('district_id', $distric)
            ->where('subdistrict_id', $subdistric)
            ->orderBy('id', 'desc')->paginate(5);
        return view('fontend.pages.allcat', compact('cat'));

    }
}
