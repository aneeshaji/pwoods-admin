<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\FooterSetting;
use App\User;
use File; 
use Storage;

class FooterSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Footer Settings.
     * Created On : 09-03-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function footerContents()
    {
        $footer_contents = FooterSetting::first();
        return view('modules/footer/footer_contents', compact('footer_contents'));
    }


    /**
     * Save Footer Contents.
     * Created On : 09-03-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveFooterContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'fb_link' => 'required',
            'insta_link' => 'required',
            'twitter_link' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $footerObjChk = FooterSetting::first();
            
            if ($footerObjChk == null) {
                $footerContentObj = new FooterSetting();
            } else {
                $footerContentObj = $footerObjChk;
            }

            $footerContentObj->fb_link = isset($request->fb_link) ? $request->fb_link : '';
            $footerContentObj->insta_link = isset($request->insta_link) ? $request->insta_link : '';
            $footerContentObj->twitter_link = isset($request->twitter_link) ? $request->twitter_link : '';
            $footerContentObj->save();

            if ($footerContentObj->id) {
                \Session::flash('success', 'Footer contents updated successfully.');
                return redirect('/page-managment/settings/footer');
            } else {
                \Session::flash('error', 'Error updating footer contents.');
                return Redirect::back();
            }
        }
    }
}
