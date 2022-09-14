<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\Gallery;
use App\User;
use File;
use Storage;

class GalleryPageController extends Controller
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
     * Gallery - List.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $gallery_images = Gallery::get();
        return view('modules/gallery/gallery_list', compact('gallery_images'));
    }

    
    /**
     * Project - Add.
     * Created On : 23-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        return view('modules/gallery/gallery_add');
    }


    /**
     * Save Gallery.
     * Created On : 17-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveGallery(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'image_title' => 'required',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            
            $galleryObj = new Gallery();
          
            //Upload - Gallery Image
            if ($request->hasfile('gallery_image')) {
                $image = $request->file('gallery_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/gallery/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $galleryObj->image_name = isset($image_name) ? $image_name : '';
            }

            $galleryObj->image_title = isset($request->image_title) ? $request->image_title : '';
            $galleryObj->save();

            if ($galleryObj->id) {
                \Session::flash('success', 'Gallery image added successfully.');
                return redirect('/page-managment/gallery/list');
            } else {
                \Session::flash('error', 'Error adding gallery image.');
                return Redirect::back();
            }
        }
    }


    /**
     * Gallery - Edit.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $id)
    {
       $gallery = Gallery::where('id', $id)->first();
       return view('modules/gallery/gallery_edit', compact('gallery'));
    }


    /**
     * Update Gallery.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateGallery(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'image_title' => 'required',
            'gallery_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            
            $galleryObj = Gallery::find($id);
          
            //Upload - Gallery Image
            if ($request->hasfile('gallery_image')) {
                $image = $request->file('gallery_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/gallery/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $galleryObj->image_name = isset($image_name) ? $image_name : '';
            }

            $galleryObj->image_title = isset($request->image_title) ? $request->image_title : '';
            $galleryObj->save();

            if ($galleryObj->id) {
                \Session::flash('success', 'Gallery image updated successfully.');
                return redirect('/page-managment/gallery/list');
            } else {
                \Session::flash('error', 'Error updating gallery image.');
                return Redirect::back();
            }
        }
    }

  
    /**
     * Delete Gallery.
     * Created On : 23-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(Request $request)
    {  
       $galleryId = $request->galleryId;
        if ($galleryId) {
            $gallery = Gallery::where('id', $galleryId)->first();
            if ($gallery->id) {
                Gallery::destroy($galleryId);
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
