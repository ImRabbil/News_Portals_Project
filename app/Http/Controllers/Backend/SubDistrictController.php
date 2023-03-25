<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
   public function index(){
    $district = DB::table('districts')->get();
    $subdistrict = DB::table('subdistrict')
                    ->join('districts','subdistrict.district_id','districts.id')
                    ->select('subdistrict.*','districts.district_en')

                   ->orderBy('id', 'desc')->paginate(4);

    return view('admin.subdistrict.index',compact('subdistrict','district'));
   }
   public function store_subdistrict(Request $request){
    $validated = $request->validate([

        'subdistrict_en' => 'required|unique:subdistrict|max:255',
        'subdistrict_hin' => 'required|unique:subdistrict|max:255',
    ]);
    $data = array();
    $data['subdistrict_en'] = $request->subdistrict_en;
    $data['subdistrict_hin'] = $request->subdistrict_hin;
    $data['district_id'] = $request->district_id;
    DB::table('subdistrict')->insert($data);

    $notification = array(
        'message' => 'subdistrict Inserted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);


   }
   public function editsubdist($id){
    $districts = DB::table('districts')->get();
    $subdistrict = DB::table('subdistrict')->where('id',$id)->first();
    return view('admin.subdistrict.editsubdist',compact('districts','subdistrict'));

}

public function update_subdistrict(Request $request, $id){
    $data = array();
    $data['subdistrict_en'] = $request->subdistrict_en;
    $data['subdistrict_hin'] = $request->subdistrict_hin;
    $data['district_id'] = $request->district_id;
    DB::table('subdistrict')->where('id',$id)->update($data);

    $notification = array(
        'message' => 'subdistrict Update Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.subdistrict')->with($notification);



}

public function delete($id)
{
    DB::table('subdistrict')->where('id', $id)->delete();

    $notification = array(
        'message' => 'subdistrict Delete Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}

   










}
