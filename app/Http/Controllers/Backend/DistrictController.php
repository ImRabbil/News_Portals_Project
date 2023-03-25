<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DistrictController extends Controller
{
    public function index()
    {
        $district = DB::table('districts')->orderBy('id', 'desc')->paginate(3);
        return view('admin.district.index', compact('district'));
    }
    public function store_district(Request $request)
    {
        $validated = $request->validate([

            'district_en' => 'required|unique:districts|max:255',
            'district_hin' => 'required|unique:districts|max:255',
        ]);
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;
        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update_district(Request $request, $id)
    {
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hin'] = $request->district_hin;
        DB::table('districts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        DB::table('districts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
