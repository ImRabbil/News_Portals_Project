<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class AdvertismentController extends Controller
{
    public function AllAds()
    {
        $ads = DB::table('ads')->get();
        return view('admin.ads.index', compact('ads'));
    }
    public function Store_ads(Request $request)
    {
        $data['link'] = $request->link;
        $data['type'] = $request->type;


        if ($request->type == 1) {

            $ads = $request->ads;
            if ($ads) {
                $image_one = uniqid() . '.' . $ads->getClientOriginalExtension();
                Image::make($ads)->resize(900, 100)->save('image/ads/' . $image_one);
                $data['ads'] = 'image/ads/' . $image_one;
                $data['type']=1;
                DB::table('ads')->insert($data);
                $notification = array(
                    'message' => 'Photo Inserted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.all.ads')->with($notification);
            } else {
                return redirect()->back();
            }
        } else {
            $ads = $request->ads;
            if ($ads) {
                $image_one = uniqid() . '.' . $ads->getClientOriginalExtension();
                Image::make($ads)->resize(500, 500)->save('image/ads/' . $image_one);
                $data['ads'] = 'image/ads/' . $image_one;
                $data['type']=2;
                DB::table('ads')->insert($data);
                $notification = array(
                    'message' => 'Photo Inserted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.all.ads')->with($notification);
            } else {
                return redirect()->back();
            }
        }
    }
}
