<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\AboutPageContent;
use App\Models\AboutPagePartner;
use App\User;
use File;
use Storage;

class AboutPageController extends Controller
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
     * About Page Settings - Main.
     * Created On : 10-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        $about_contents = AboutPageContent::first();
        return view('modules/about/about_page_contents', compact('about_contents'));
    }


    /**
     * About Page Settings - Partners.
     * Created On : 10-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function partners()
    {
        $partners_contents = AboutPagePartner::first();
        return view('modules/about/about_page_partners', compact('partners_contents'));
    }


    /**
     * Save About Contents.
     * Created On : 10-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveAboutContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'about' => 'required',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'director' => 'required',
            'director_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $aboutObjChk = AboutPageContent::first();
            
            if ($aboutObjChk == null) {
                $aboutPageObj = new AboutPageContent();
            } else {
                $aboutPageObj = $aboutObjChk;
            }

            //Upload - 1
            if ($request->hasfile('about_image')) {
                $image_1 = $request->file('about_image');
                $filename_1 = $image_1->getClientOriginalName();
                $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                $image_path_1 = 'uploads/about/' . $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path_1, file_get_contents($image_1), 'public');
                $imageName = Storage::disk('s3')->url($image_name_1);
                $aboutPageObj->about_content_image = isset($image_name_1) ? $image_name_1 : '';
            }

            //Upload - 2
            if ($request->hasfile('banner_image')) {
                $image_2 = $request->file('banner_image');
                $filename_2 = $image_2->getClientOriginalName();
                $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                $image_path_2 = 'uploads/about/' . $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path_2, file_get_contents($image_2), 'public');
                $imageName = Storage::disk('s3')->url($image_name_2);
                $aboutPageObj->about_banner_image = isset($image_name_2) ? $image_name_2 : '';
            }

            //Upload - 3
            if ($request->hasfile('director_image')) {
                $image_3 = $request->file('director_image');
                $filename_3 = $image_3->getClientOriginalName();
                $original_filename_3 = pathinfo($filename_3, PATHINFO_FILENAME);
                $image_name_3 = $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension();
                $image_path_3 = 'uploads/about/' . $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path_3, file_get_contents($image_3), 'public');
                $imageName = Storage::disk('s3')->url($image_name_3);
                $aboutPageObj->director_image = isset($image_name_3) ? $image_name_3 : '';
            }

            $aboutPageObj->about_content = isset($request->about) ? $request->about : '';
            $aboutPageObj->director_content = isset($request->director) ? $request->director : '';
            $aboutPageObj->save();

            if ($aboutPageObj->id) {
                \Session::flash('success', 'About page updated successfully.');
                return redirect('/page-managment/about/main');
            } else {
                \Session::flash('error', 'Error updating about section.');
                return Redirect::back();
            }
        }
    }


     /**
     * Save About Partners Contents.
     * Created On : 10-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveAboutPartners(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'partners_title' => 'required',
            'partners' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $aboutPartnerObjChk = AboutPagePartner::first();
            
            if ($aboutPartnerObjChk == null) {
                $aboutPartnerObj = new AboutPagePartner();
            } else {
                $aboutPartnerObj = $aboutPartnerObjChk;
            }
            
            $aboutPartnerObj->partners_title = isset($request->partners_title) ? $request->partners_title : '';
            $aboutPartnerObj->partners_content = isset($request->partners) ? $request->partners : '';
            $aboutPartnerObj->save(); 

            if ($aboutPartnerObj->id) {
                \Session::flash('success', 'About partners section updated successfully.');
                return redirect('/page-managment/about/partners');
            } else {
                \Session::flash('error', 'Error updating about partners section.');
                return Redirect::back();
            }
        }
    }

    
    /**
     * Delete Student.
     * Created On : 04-05-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(Request $request)
    {
       $studentId = $request->studentId;
        if ($studentId) {
            $student = Student::where('id', $studentId)->first();
            if ($student->id) {
                Student::destroy($studentId);
                $msg = "Success";
            } else {
                $msg = "Error";
            }
        } else {
            $msg = "Error";
        }
        return $msg;
    }
}
