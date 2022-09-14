<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\HomePageBannerImage;
use App\Models\HomePageAboutSection;
use App\Models\HomePageTestimonial;
use App\Models\HomePageProjectSection;
use App\Models\HomePageContactBannerSection;
use App\User;
use File;
use Storage;

class HomePageController extends Controller
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
     * Home Page Settings - Main.
     * Created On : 06-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return view('modules/home/home_main_section_contents');
    }


    /**
     * Home Page Settings - About.
     * Created On : 06-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $about_data = HomePageAboutSection::first();
        return view('modules/home/home_about_section_contents', compact('about_data'));
    }


    /**
     * Home Page Settings - Contact Banner.
     * Created On : 18-04-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactBanner()
    {
        $banner_data = HomePageContactBannerSection::first();
        return view('modules/home/home_contact_banner_section_contents', compact('banner_data'));
    }


    /**
     * Save Home Page Contact Banner Contents.
     * Created On : 18-04-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveHomeContactBannerContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'contact' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $homeContactBannerSectionObjChk = HomePageContactBannerSection::first();
            
            if ($homeContactBannerSectionObjChk == null) {
                $homeContactBannerSectionObj = new HomePageContactBannerSection();
            } else {
                $homeContactBannerSectionObj = $homeContactBannerSectionObjChk;
            }

            $homeContactBannerSectionObj->title = isset($request->title) ? $request->title : '';
            $homeContactBannerSectionObj->content = isset($request->contact) ? $request->contact : '';
            $homeContactBannerSectionObj->save();

            if ($homeContactBannerSectionObj->id) {
                \Session::flash('success', 'Home Page Contact Banner section updated successfully.');
                return redirect('/page-managment/home/contact-banner');
            } else {
                \Session::flash('error', 'Error updating home page contact banner section.');
                return Redirect::back();
            }
        }
    }

    
    /**
     * Home Page Settings - Project.
     * Created On : 26-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function project()
    {
        $project_data = HomePageProjectSection::first();
        return view('modules/home/home_project_section_contents', compact('project_data'));
    }

    
    /**
     * Save Project Contents.
     * Created On : 26-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveProjectContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'project' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //$homeProjectSectionObj = new HomePageProjectSection();

            $homeProjectSectionObjChk = HomePageProjectSection::first();
            
            if ($homeProjectSectionObjChk == null) {
                $homeProjectSectionObj = new HomePageProjectSection();
            } else {
                $homeProjectSectionObj = $homeProjectSectionObjChk;
            }

            $homeProjectSectionObj->project_content = isset($request->project) ? $request->project : '';
            $homeProjectSectionObj->save();

            if ($homeProjectSectionObj->id) {
                \Session::flash('success', 'Home Page Project section updated successfully.');
                return redirect('/page-managment/home/project');
            } else {
                \Session::flash('error', 'Error updating home page project section.');
                return Redirect::back();
            }
        }
    }


    /**
     * Home Page Settings - Add Testimonials.
     * Created On : 10-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addTestimonials()
    {
        return view('modules/home/testimonials/home_testimonials_section_contents_add');
    }


    /**
     * Home Page Settings - List Testimonials.
     * Created On : 10-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listTestimonials()
    {
        $testimonials = HomePageTestimonial::get();
        return view('modules/home/testimonials/home_testimonials_section_contents_list', compact('testimonials'));
    }


    /**
     * Save Home Page Banners.
     * Created On : 08-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveBannerImages(Request $request)
    { 
        $validator = Validator::make($request->all(),
		[
            'banner_image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_image_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $imgObj = new HomePageBannerImage();

            $chk = HomePageBannerImage::first();
                
            if ($chk != null) {
                HomePageBannerImage::destroy($chk->id);

                $image_path_1 = 'uploads/home/banners/' . $chk->first_banner_image_name;
                $image_path_2 = 'uploads/home/banners/' . $chk->second_banner_image_name;
                Storage::disk('s3')->delete($image_path_1);
                Storage::disk('s3')->delete($image_path_2);
            }
           
            if ($request->hasfile('banner_image_1') && $request->hasfile('banner_image_2')) {
                //Upload - 1
                // $image_1 = $request->file('banner_image_1');
                // $filename_1 = $image_1->getClientOriginalName();
                // $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                // $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                // $request->banner_image_1->move(public_path('uploads/home/banners'), $image_name_1);

                //Upload - 1
                $image_1 = $request->file('banner_image_1');
                $filename_1 = $image_1->getClientOriginalName();
                $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                $image_path_1 = 'uploads/home/banners/' . $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path_1, file_get_contents($image_1), 'public');
                $imageName_1 = Storage::disk('s3')->url($image_name_1);
                

                //Upload - 2
                // $image_2 = $request->file('banner_image_2');
                // $filename_2 = $image_2->getClientOriginalName();
                // $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                // $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                // $request->banner_image_2->move(public_path('uploads/home/banners'), $image_name_2);

                $image_2 = $request->file('banner_image_2');
                $filename_2 = $image_2->getClientOriginalName();
                $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                $image_path_2 = 'uploads/home/banners/' . $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path_2, file_get_contents($image_2), 'public');
                $imageName_2 = Storage::disk('s3')->url($image_name_2);
                
                $imgObj->first_banner_image_name = isset($image_name_1) ? $image_name_1 : '';
                $imgObj->second_banner_image_name = isset($image_name_2) ? $image_name_2 : '';
                $imgObj->save(); 
            } else {
               \Session::flash('error', 'Validation errors.');
                return Redirect::back(); 
            }

            if ($imgObj->id) {
                \Session::flash('success', 'Home page banners updated successfully.');
                return redirect('/page-managment/home/main');
            } else {
                \Session::flash('error', 'Error updating home page banners.');
                return Redirect::back();
            }
        }
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
            'about_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $homeAboutSectionObj = new HomePageAboutSection();

            $chk = HomePageAboutSection::first();
    
            if ($chk != null) {
                HomePageAboutSection::destroy($chk->id);
                $image_path = 'uploads/home/about/' . $chk->about_image;
                Storage::disk('s3')->delete($image_path);
            }

            if ($request->hasfile('about_image')) {
                //Upload
                $image = $request->file('about_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/home/about/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $homeAboutSectionObj->about_image = isset($image_name) ? $image_name : '';
            }

            $homeAboutSectionObj->about_content = isset($request->about) ? $request->about : '';
            $homeAboutSectionObj->save();

            if ($homeAboutSectionObj->id) {
                \Session::flash('success', 'About section updated successfully.');
                return redirect('/page-managment/home/about');
            } else {
                \Session::flash('error', 'Error updating about section.');
                return Redirect::back();
            }
        }
    }


     /**
     * Save Testimonials.
     * Created On : 10-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveTestimonials(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'author_name' => 'required',
            'author_designation' => 'required',
            'testimonials' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $testimonialObj = new HomePageTestimonial();
            $testimonialObj->author_name = isset($request->author_name) ? $request->author_name : '';
            $testimonialObj->author_designation = isset($request->author_designation) ? $request->author_designation : '';
            $testimonialObj->content = isset($request->testimonials) ? $request->testimonials : '';
            $testimonialObj->save(); 

            if ($testimonialObj) {
                \Session::flash('success', 'Testimonials section updated successfully.');
                return redirect('/page-managment/home/testimonials/list');
            } else {
                \Session::flash('error', 'Error updating testimonials section.');
                return Redirect::back();
            }
        }
    }


    /**
     * Edit Testimonials.
     * Created On : 24-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editTestimonials(Request $request, $id)
    {
        $testimonial = HomePageTestimonial::where('id', $id)->first();
        return view('modules/home/testimonials/home_testimonials_section_contents_edit', compact('testimonial'));
    }

    
    /**
     * Update Testimonials.
     * Created On : 24-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateTestimonials(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'author_name' => 'required',
            'author_designation' => 'required',
            'testimonials' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $testimonialObj = HomePageTestimonial::find($id);

            $testimonialObj->author_name = isset($request->author_name) ? $request->author_name : '';
            $testimonialObj->author_designation = isset($request->author_designation) ? $request->author_designation : '';
            $testimonialObj->content = isset($request->testimonials) ? $request->testimonials : '';
            $testimonialObj->save(); 

            if ($testimonialObj) {
                \Session::flash('success', 'Testimonials section updated successfully.');
                return redirect('/page-managment/home/testimonials/list');
            } else {
                \Session::flash('error', 'Error updating testimonials section.');
                return Redirect::back();
            }
        }
    }

    
    /**
     * Delete Testimonials.
     * Created On : 24-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(Request $request)
    {
       $testimonialId = $request->testimonialId;
        if ($testimonialId) {
            $testimonial = HomePageTestimonial::where('id', $testimonialId)->first();
            if ($testimonial->id) {
                HomePageTestimonial::destroy($testimonialId);
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
