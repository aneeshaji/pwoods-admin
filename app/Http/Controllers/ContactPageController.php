<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\ContactPageContent;
use App\User;
use File;
use Storage;

class ContactPageController extends Controller
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
     * Contact Page Settings - Main.
     * Created On : 10-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        $contact_contents = ContactPageContent::first();
        return view('modules/contact/contact_page_contents', compact('contact_contents'));
    }


    /**
     * Save Contact Contents.
     * Created On : 10-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveContactContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'contact' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required',
            'contact_banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $contactObjChk = ContactPageContent::first();
            
            if ($contactObjChk == null) {
                $contactPageObj = new ContactPageContent();
            } else {
                $contactPageObj = $contactObjChk;
            }

            //Upload - 1
            if ($request->hasfile('banner_image')) {
                $image = $request->file('banner_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/contact/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $contactPageObj->contact_banner_image = isset($image_name) ? $image_name : '';
            }

            $contactPageObj->contact_content = isset($request->contact) ? $request->contact : '';
            $contactPageObj->contact_phone = isset($request->contact_phone) ? $request->contact_phone : '';
            $contactPageObj->contact_email = isset($request->contact_email) ? $request->contact_email : '';
            $contactPageObj->contact_address = isset($request->address) ? $request->address : '';
            $contactPageObj->save();

            if ($contactPageObj->id) {
                \Session::flash('success', 'Contact page updated successfully.');
                return redirect('/page-managment/contact/main');
            } else {
                \Session::flash('error', 'Error updating contact page.');
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
            $aboutPartnerObj = new AboutPagePartner();
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
