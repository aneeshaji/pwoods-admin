<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\ServicesMainContent;
use App\Models\Service;
use App\User;
use File;
use Storage;

class ServicePageController extends Controller
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
     * Services Page - Main.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mainContents()
    {
        $services_contents = ServicesMainContent::first();
        return view('modules/services/services_main_section_contents', compact('services_contents'));
    }


    /**
     * Save Services Main Contents.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveServiceMainContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'main_title' => 'required',
            'services' => 'required',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $servicesObjChk = ServicesMainContent::first();
            

            if ($servicesObjChk == null) {
                $servicesObj = new ServicesMainContent();
            } else {
                $servicesObj = $servicesObjChk;
            }
            
            //Upload - Services Main Image
            if ($request->hasfile('banner_image')) {
                $image = $request->file('banner_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/services/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $servicesObj->banner_image = isset($image_name) ? $image_name : '';
            }

            $servicesObj->main_title = isset($request->main_title) ? $request->main_title : '';
            $servicesObj->main_content = isset($request->services) ? $request->services : '';
            $servicesObj->save();

            if ($servicesObj->id) {
                \Session::flash('success', 'Services main contents updated successfully.');
                return redirect('/page-managment/services/main-content');
            } else {
                \Session::flash('error', 'Error updating service main content details.');
                return Redirect::back();
            }
        }
    }


    /**
     * Services - List.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $services = Service::get();
        return view('modules/services/services_list', compact('services'));
    }


    /**
     * Services - Add.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        return view('modules/services/services_add');
    }


    /**
     * Services - Save.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveServices(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'main_title' => 'required',
            'first_content_title' => 'required',
            'first' => 'required',
            'second_content_title' => 'required',
            'second_content_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image_title_1' => 'required',
            'feature_image_name_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image_title_2' => 'required',
            'feature_image_name_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image_title_3' => 'required',
            'feature_image_name_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $serviceObj = new Service();

            //Upload - Service Banner Image
            if ($request->hasfile('banner_image')) {
                $image = $request->file('banner_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/services/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $serviceObj->banner_image = isset($image_name) ? $image_name : '';
            }

            //Upload - Second Content Image
            if ($request->hasfile('second_content_image')) {
                $image = $request->file('second_content_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/services/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $serviceObj->second_content_image = isset($image_name) ? $image_name : '';
            }

            //Upload - Service Image - 1
            if ($request->hasfile('feature_image_name_1')) {
                $image_1 = $request->file('feature_image_name_1');
                $filename_1 = $image_1->getClientOriginalName();
                $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                $image_path_1 = 'uploads/services/' . $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension(); 
                
                $t_1 = Storage::disk('s3')->put($image_path_1, file_get_contents($image_1), 'public');
                $imageName_1 = Storage::disk('s3')->url($image_name_1);
                $serviceObj->feature_image_name_1 = isset($image_name_1) ? $image_name_1 : '';
            }

            //Upload - Service Image - 2
            if ($request->hasfile('feature_image_name_2')) {
                $image_2 = $request->file('feature_image_name_2');
                $filename_2 = $image_2->getClientOriginalName();
                $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                $image_path_2 = 'uploads/services/' . $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension(); 
                
                $t_2 = Storage::disk('s3')->put($image_path_2, file_get_contents($image_2), 'public');
                $imageName_2 = Storage::disk('s3')->url($image_name_2);
                $serviceObj->feature_image_name_2 = isset($image_name_2) ? $image_name_2 : '';
            }

            //Upload - Service Image - 3
            if ($request->hasfile('feature_image_name_3')) {
                $image_3 = $request->file('feature_image_name_3');
                $filename_3 = $image_3->getClientOriginalName();
                $original_filename_3 = pathinfo($filename_3, PATHINFO_FILENAME);
                $image_name_3 = $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension();
                $image_path_3 = 'uploads/services/' . $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension(); 
                
                $t_3 = Storage::disk('s3')->put($image_path_3, file_get_contents($image_3), 'public');
                $imageName_3 = Storage::disk('s3')->url($image_name_3);
                $serviceObj->feature_image_name_3 = isset($image_name_3) ? $image_name_3 : '';
            }

            $serviceObj->main_title = isset($request->main_title) ? $request->main_title : '';
            $serviceObj->first_content_title = isset($request->first_content_title) ? $request->first_content_title : '';
            $serviceObj->first_content = isset($request->first) ? $request->first : '';
            $serviceObj->second_content_title = isset($request->second_content_title) ? $request->second_content_title : '';
            $serviceObj->second_content = isset($request->second) ? $request->second : '';
            $serviceObj->feature_image_title_1 = isset($request->feature_image_title_1) ? $request->feature_image_title_1 : '';
            $serviceObj->feature_image_title_2 = isset($request->feature_image_title_2) ? $request->feature_image_title_2 : '';
            $serviceObj->feature_image_title_3 = isset($request->feature_image_title_3) ? $request->feature_image_title_3 : '';
            $serviceObj->save();

            if ($serviceObj->id) {
                \Session::flash('success', 'Service added successfully.');
                return redirect('/page-managment/services/list');
            } else {
                \Session::flash('error', 'Error adding service.');
                return Redirect::back();
            }
        }
    }


    /**
     * Services - Edit.
     * Created On : 24-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $id)
    {
       $service = Service::where('id', $id)->first();
       return view('modules/services/services_edit', compact('service'));
    }


    /**
     * Update Service.
     * Created On : 24-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateServices(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'main_title' => 'required',
            'first_content_title' => 'required',
            'first' => 'required',
            'second_content_title' => 'required',
            'second_content_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'second' => 'required',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image_title_1' => 'required',
            'feature_image_name_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image_title_2' => 'required',
            'feature_image_name_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image_title_3' => 'required',
            'feature_image_name_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $serviceObj = Service::find($id);

            //Upload - Service Banner Image
            if ($request->hasfile('banner_image')) {
                $image = $request->file('banner_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/services/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $serviceObj->banner_image = isset($image_name) ? $image_name : '';
            }

            //Upload - Second Content Image
             if ($request->hasfile('second_content_image')) {
                $image = $request->file('second_content_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/services/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $serviceObj->second_content_image = isset($image_name) ? $image_name : '';
            }

            //Upload - Service Image - 1
            if ($request->hasfile('feature_image_name_1')) {
                $image_1 = $request->file('feature_image_name_1');
                $filename_1 = $image_1->getClientOriginalName();
                $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                $image_path_1 = 'uploads/services/' . $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension(); 
                
                $t_1 = Storage::disk('s3')->put($image_path_1, file_get_contents($image_1), 'public');
                $imageName_1 = Storage::disk('s3')->url($image_name_1);
                $serviceObj->feature_image_name_1 = isset($image_name_1) ? $image_name_1 : '';
            }

            //Upload - Service Image - 2
            if ($request->hasfile('feature_image_name_2')) {
                $image_2 = $request->file('feature_image_name_2');
                $filename_2 = $image_2->getClientOriginalName();
                $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                $image_path_2 = 'uploads/services/' . $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension(); 
                
                $t_2 = Storage::disk('s3')->put($image_path_2, file_get_contents($image_2), 'public');
                $imageName_2 = Storage::disk('s3')->url($image_name_2);
                $serviceObj->feature_image_name_2 = isset($image_name_2) ? $image_name_2 : '';
            }

            //Upload - Service Image - 3
            if ($request->hasfile('feature_image_name_3')) {
                $image_3 = $request->file('feature_image_name_3');
                $filename_3 = $image_3->getClientOriginalName();
                $original_filename_3 = pathinfo($filename_3, PATHINFO_FILENAME);
                $image_name_3 = $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension();
                $image_path_3 = 'uploads/services/' . $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension(); 
                
                $t_3 = Storage::disk('s3')->put($image_path_3, file_get_contents($image_3), 'public');
                $imageName_3 = Storage::disk('s3')->url($image_name_3);
                $serviceObj->feature_image_name_3 = isset($image_name_3) ? $image_name_3 : '';
            }

            $serviceObj->main_title = isset($request->main_title) ? $request->main_title : '';
            $serviceObj->first_content_title = isset($request->first_content_title) ? $request->first_content_title : '';
            $serviceObj->first_content = isset($request->first) ? $request->first : '';
            $serviceObj->second_content_title = isset($request->second_content_title) ? $request->second_content_title : '';
            $serviceObj->second_content = isset($request->second) ? $request->second : '';
            $serviceObj->feature_image_title_1 = isset($request->feature_image_title_1) ? $request->feature_image_title_1 : '';
            $serviceObj->feature_image_title_2 = isset($request->feature_image_title_2) ? $request->feature_image_title_2 : '';
            $serviceObj->feature_image_title_3 = isset($request->feature_image_title_3) ? $request->feature_image_title_3 : '';
            $serviceObj->save();

            if ($serviceObj->id) {
                \Session::flash('success', 'Service edited successfully.');
                return redirect('/page-managment/services/list');
            } else {
                \Session::flash('error', 'Error editing service.');
                return Redirect::back();
            }
        }
    }

  
    /**
     * Delete Service.
     * Created On : 24-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(Request $request)
    {  
       $serviceId = $request->serviceId;
        if ($serviceId) {
            $service = Service::where('id', $serviceId)->first();
            if ($service->id) {
                Service::destroy($serviceId);
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
