<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function links_index()
    {
        $link = DB::table('social_links')->first();
        return view('admin.setting.social_link', compact('link'));
    }
    public function update_links(Request $request, $id)
    {

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkdin'] = $request->linkdin;
        $data['instagram'] = $request->instagram;
        DB::table('social_links')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Socials Link Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function seo_index()
    {
        $seo = DB::table('seos')->first();
        return view('admin.setting.seo', compact('seo'));
    }

    public function update_seo(Request $request, $id)
    {

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_des'] = $request->meta_des;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verify'] = $request->google_verify;
        DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SEO Link Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function prayer_index()
    {
        $pray = DB::table('prayers')->first();
        return view('admin.setting.prayer', compact('pray'));
    }
    public function update_prayer(Request $request, $id)
    {

        $data = array();
        $data['fajar'] = $request->fajar;
        $data['johor'] = $request->johor;
        $data['achor'] = $request->achor;
        $data['magrib'] = $request->magrib;
        $data['esha'] = $request->esha;
        $data['jummah'] = $request->jummah;
        DB::table('prayers')->where('id', $id)->update($data);

        $notification = array(
            'message' => ' Prayers Time Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function liveTv_index()
    {
        $tv = DB::table('live_tvs')->first();
        return view('admin.setting.livetv', compact('tv'));
    }

    public function update_liveTv(Request $request, $id)
    {

        $data = array();
        $data['embed_code'] = $request->embed_code;
        // $data['status'] = $request->status;
        DB::table('live_tvs')->where('id', $id)->update($data);

        $notification = array(
            'message' => ' Live TV Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ActiveSetting(Request $request, $id)
    {
        DB::table('live_tvs')->where('id', $id)->update(['status'=>1]);
        $notification = array(
            'message' => ' Live TV Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function DeactiveSetting(Request $request, $id)
    {
        DB::table('live_tvs')->where('id', $id)->update(['status'=>0]);
        $notification = array(
            'message' => ' Live TV Deactive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function notice_index()
    {
        $notice = DB::table('notices')->first();
        return view('admin.setting.notice', compact('notice'));
    }

    public function update_notice(Request $request, $id)
    {

        $data = array();
        $data['notice'] = $request->notice;
        // $data['status'] = $request->status;
        DB::table('notices')->where('id', $id)->update($data);

        $notification = array(
            'message' => ' Notice Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function NoticeActiveSetting(Request $request, $id)
    {
        DB::table('notices')->where('id', $id)->update(['status'=>1]);
        $notification = array(
            'message' => ' Notice Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function NoticeDeactiveSetting(Request $request, $id)
    {
        DB::table('notices')->where('id', $id)->update(['status'=>0]);
        $notification = array(
            'message' => ' Notice Deactive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }






    public function website_index()
    {
        $website = DB::table('websites')->get();
        return view('admin.website.index', compact('website'));
    }

    public function Store_Website(Request $request)
    {
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       
    }

    public function update_website(Request $request, $id)
    {
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Website Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        DB::table('websites')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Website Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    




}
