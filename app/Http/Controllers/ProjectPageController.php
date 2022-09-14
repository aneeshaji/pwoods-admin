<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\ProjectPageContent;
use App\User;
use File;
use Storage;

class ProjectPageController extends Controller
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
     * Projects Contents.
     * Created On : 18-04-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contents()
    {
        $project_contents = ProjectPageContent::first();
        return view('modules/project/project_contents', compact('project_contents'));
    }


    /**
     * Save Project Page Contents.
     * Created On : 18-04-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveProjectPageContents(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'project' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $projectPageContentObjChk = ProjectPageContent::first();
            
            if ($projectPageContentObjChk == null) {
                $projectPageContentObj = new ProjectPageContent();
            } else {
                $projectPageContentObj = $projectPageContentObjChk;
            }

            $projectPageContentObj->contents = isset($request->project) ? $request->project : '';
            $projectPageContentObj->save();

            if ($projectPageContentObj->id) {
                \Session::flash('success', 'Project Page Contents updated successfully.');
                return redirect('/page-managment/projects/contents');
            } else {
                \Session::flash('error', 'Error updating Project Page contents.');
                return Redirect::back();
            }
        }
    }


    /**
     * Projects List.
     * Created On : 10-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $projects = Project::get();
        return view('modules/project/project_list', compact('projects'));
    }

    
    /**
     * Project - Add.
     * Created On : 10-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add()
    {
        //$contact_contents = ContactPageContent::first();
        return view('modules/project/project_add');
    }


    /**
     * Save Projects.
     * Created On : 17-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveProjects(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'project_name' => 'required',
            'project_year' => 'required',
            'project_company' => 'required',
            'project_location' => 'required',
            'project_category' => 'required',
            'project_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project' => 'required',
            'project_image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_6' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $projectObj = new Project();

            //Upload - Project Main Image
            if ($request->hasfile('project_image')) {
                $image = $request->file('project_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/projects/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $projectObj->project_banner_image = isset($image_name) ? $image_name : '';
            }

            //Upload - Project Image - 1
            if ($request->hasfile('project_image_1')) {
                $image_1 = $request->file('project_image_1');
                $filename_1 = $image_1->getClientOriginalName();
                $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                $image_path_1 = 'uploads/projects/' . $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension(); 
                
                $t_1 = Storage::disk('s3')->put($image_path_1, file_get_contents($image_1), 'public');
                $imageName_1 = Storage::disk('s3')->url($image_name_1);
                $projectObj->project_image_1 = isset($image_name_1) ? $image_name_1 : '';
            }

            //Upload - Project Image - 2
            if ($request->hasfile('project_image_2')) {
                $image_2 = $request->file('project_image_2');
                $filename_2 = $image_2->getClientOriginalName();
                $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                $image_path_2 = 'uploads/projects/' . $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension(); 
                
                $t_2 = Storage::disk('s3')->put($image_path_2, file_get_contents($image_2), 'public');
                $imageName_2 = Storage::disk('s3')->url($image_name_2);
                $projectObj->project_image_2 = isset($image_name_2) ? $image_name_2 : '';
            }

            //Upload - Project Image - 3
            if ($request->hasfile('project_image_3')) {
                $image_3 = $request->file('project_image_3');
                $filename_3 = $image_3->getClientOriginalName();
                $original_filename_3 = pathinfo($filename_3, PATHINFO_FILENAME);
                $image_name_3 = $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension();
                $image_path_3 = 'uploads/projects/' . $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension(); 
                
                $t_3 = Storage::disk('s3')->put($image_path_3, file_get_contents($image_3), 'public');
                $imageName_3 = Storage::disk('s3')->url($image_name_3);
                $projectObj->project_image_3 = isset($image_name_3) ? $image_name_3 : '';
            }

            //Upload - Project Image - 4
            if ($request->hasfile('project_image_4')) {
                $image_4 = $request->file('project_image_4');
                $filename_4 = $image_4->getClientOriginalName();
                $original_filename_4 = pathinfo($filename_4, PATHINFO_FILENAME);
                $image_name_4 = $original_filename_4.'_'.time().'.'.$image_4->getClientOriginalExtension();
                $image_path_4 = 'uploads/projects/' . $original_filename_4.'_'.time().'.'.$image_4->getClientOriginalExtension(); 
                
                $t_4 = Storage::disk('s3')->put($image_path_4, file_get_contents($image_4), 'public');
                $imageName_4 = Storage::disk('s3')->url($image_name_4);
                $projectObj->project_image_4 = isset($image_name_4) ? $image_name_4 : '';
            }

            //Upload - Project Image - 5
            if ($request->hasfile('project_image_5')) {
                $image_5 = $request->file('project_image_5');
                $filename_5 = $image_5->getClientOriginalName();
                $original_filename_5 = pathinfo($filename_5, PATHINFO_FILENAME);
                $image_name_5 = $original_filename_5.'_'.time().'.'.$image_5->getClientOriginalExtension();
                $image_path_5 = 'uploads/projects/' . $original_filename_5.'_'.time().'.'.$image_5->getClientOriginalExtension(); 
                
                $t_5 = Storage::disk('s3')->put($image_path_5, file_get_contents($image_5), 'public');
                $imageName_5 = Storage::disk('s3')->url($image_name_5);
                $projectObj->project_image_5 = isset($image_name_5) ? $image_name_5 : '';
            }

            //Upload - Project Image - 6
            if ($request->hasfile('project_image_6')) {
                $image_6 = $request->file('project_image_6');
                $filename_6 = $image_6->getClientOriginalName();
                $original_filename_6 = pathinfo($filename_6, PATHINFO_FILENAME);
                $image_name_6 = $original_filename_6.'_'.time().'.'.$image_6->getClientOriginalExtension();
                $image_path_6 = 'uploads/projects/' . $original_filename_6.'_'.time().'.'.$image_6->getClientOriginalExtension(); 
                
                $t_6 = Storage::disk('s3')->put($image_path_6, file_get_contents($image_6), 'public');
                $imageName_6 = Storage::disk('s3')->url($image_name_6);
                $projectObj->project_image_6 = isset($image_name_6) ? $image_name_6 : '';
            }

            $projectObj->project_name = isset($request->project_name) ? $request->project_name : '';
            $projectObj->project_content = isset($request->project) ? $request->project : '';
            $projectObj->project_year = isset($request->project_year) ? $request->project_year : '';
            $projectObj->project_company = isset($request->project_company) ? $request->project_company : '';
            $projectObj->project_location = isset($request->project_location) ? $request->project_location : '';
            $projectObj->project_category = isset($request->project_category) ? $request->project_category : '';
            $projectObj->save();

            if ($projectObj->id) {
                \Session::flash('success', 'project details updated successfully.');
                return redirect('/page-managment/projects/list');
            } else {
                \Session::flash('error', 'Error updating project details.');
                return Redirect::back();
            }
        }
    }


    /**
     * Projects - Edit.
     * Created On : 22-01-2020
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $id)
    {
       $project = Project::where('id', $id)->first();
       return view('modules/project/project_edit', compact('project'));
    }


    /**
     * Update Project.
     * Created On : 22-01-2021
     * Author : Aneesh Ajithkumar
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProject(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'project_name' => 'required',
            'project_year' => 'required',
            'project_company' => 'required',
            'project_location' => 'required',
            'project_category' => 'required',
            'project_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project' => 'required',
            'project_image_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_image_6' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $projectObj = Project::find($id);

            //Upload - Project Main Image
            if ($request->hasfile('project_image')) {
                $image = $request->file('project_image');
                $filename = $image->getClientOriginalName();
                $original_filename = pathinfo($filename, PATHINFO_FILENAME);
                $image_name = $original_filename.'_'.time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/projects/' . $original_filename.'_'.time().'.'.$image->getClientOriginalExtension(); 
                
                $t = Storage::disk('s3')->put($image_path, file_get_contents($image), 'public');
                $imageName = Storage::disk('s3')->url($image_name);
                $projectObj->project_banner_image = isset($image_name) ? $image_name : '';
            }

            //Upload - Project Image - 1
            if ($request->hasfile('project_image_1')) {
                $image_1 = $request->file('project_image_1');
                $filename_1 = $image_1->getClientOriginalName();
                $original_filename_1 = pathinfo($filename_1, PATHINFO_FILENAME);
                $image_name_1 = $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension();
                $image_path_1 = 'uploads/projects/' . $original_filename_1.'_'.time().'.'.$image_1->getClientOriginalExtension(); 
                
                $t_1 = Storage::disk('s3')->put($image_path_1, file_get_contents($image_1), 'public');
                $imageName_1 = Storage::disk('s3')->url($image_name_1);
                $projectObj->project_image_1 = isset($image_name_1) ? $image_name_1 : '';
            }

            //Upload - Project Image - 2
            if ($request->hasfile('project_image_2')) {
                $image_2 = $request->file('project_image_2');
                $filename_2 = $image_2->getClientOriginalName();
                $original_filename_2 = pathinfo($filename_2, PATHINFO_FILENAME);
                $image_name_2 = $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension();
                $image_path_2 = 'uploads/projects/' . $original_filename_2.'_'.time().'.'.$image_2->getClientOriginalExtension(); 
                
                $t_2 = Storage::disk('s3')->put($image_path_2, file_get_contents($image_2), 'public');
                $imageName_2 = Storage::disk('s3')->url($image_name_2);
                $projectObj->project_image_2 = isset($image_name_2) ? $image_name_2 : '';
            }

            //Upload - Project Image - 3
            if ($request->hasfile('project_image_3')) {
                $image_3 = $request->file('project_image_3');
                $filename_3 = $image_3->getClientOriginalName();
                $original_filename_3 = pathinfo($filename_3, PATHINFO_FILENAME);
                $image_name_3 = $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension();
                $image_path_3 = 'uploads/projects/' . $original_filename_3.'_'.time().'.'.$image_3->getClientOriginalExtension(); 
                
                $t_3 = Storage::disk('s3')->put($image_path_3, file_get_contents($image_3), 'public');
                $imageName_3 = Storage::disk('s3')->url($image_name_3);
                $projectObj->project_image_3 = isset($image_name_3) ? $image_name_3 : '';
            }

            //Upload - Project Image - 4
            if ($request->hasfile('project_image_4')) {
                $image_4 = $request->file('project_image_4');
                $filename_4 = $image_4->getClientOriginalName();
                $original_filename_4 = pathinfo($filename_4, PATHINFO_FILENAME);
                $image_name_4 = $original_filename_4.'_'.time().'.'.$image_4->getClientOriginalExtension();
                $image_path_4 = 'uploads/projects/' . $original_filename_4.'_'.time().'.'.$image_4->getClientOriginalExtension(); 
                
                $t_4 = Storage::disk('s3')->put($image_path_4, file_get_contents($image_4), 'public');
                $imageName_4 = Storage::disk('s3')->url($image_name_4);
                $projectObj->project_image_4 = isset($image_name_4) ? $image_name_4 : '';
            }

            //Upload - Project Image - 5
            if ($request->hasfile('project_image_5')) {
                $image_5 = $request->file('project_image_5');
                $filename_5 = $image_5->getClientOriginalName();
                $original_filename_5 = pathinfo($filename_5, PATHINFO_FILENAME);
                $image_name_5 = $original_filename_5.'_'.time().'.'.$image_5->getClientOriginalExtension();
                $image_path_5 = 'uploads/projects/' . $original_filename_5.'_'.time().'.'.$image_5->getClientOriginalExtension(); 
                
                $t_5 = Storage::disk('s3')->put($image_path_5, file_get_contents($image_5), 'public');
                $imageName_5 = Storage::disk('s3')->url($image_name_5);
                $projectObj->project_image_5 = isset($image_name_5) ? $image_name_5 : '';
            }

            //Upload - Project Image - 6
            if ($request->hasfile('project_image_6')) {
                $image_6 = $request->file('project_image_6');
                $filename_6 = $image_6->getClientOriginalName();
                $original_filename_6 = pathinfo($filename_6, PATHINFO_FILENAME);
                $image_name_6 = $original_filename_6.'_'.time().'.'.$image_6->getClientOriginalExtension();
                $image_path_6 = 'uploads/projects/' . $original_filename_6.'_'.time().'.'.$image_6->getClientOriginalExtension(); 
                
                $t_6 = Storage::disk('s3')->put($image_path_6, file_get_contents($image_6), 'public');
                $imageName_6 = Storage::disk('s3')->url($image_name_6);
                $projectObj->project_image_6 = isset($image_name_6) ? $image_name_6 : '';
            }

            $projectObj->project_name = isset($request->project_name) ? $request->project_name : '';
            $projectObj->project_content = isset($request->project) ? $request->project : '';
            $projectObj->project_year = isset($request->project_year) ? $request->project_year : '';
            $projectObj->project_company = isset($request->project_company) ? $request->project_company : '';
            $projectObj->project_location = isset($request->project_location) ? $request->project_location : '';
            $projectObj->project_category = isset($request->project_category) ? $request->project_category : '';
            $projectObj->save();

            if ($projectObj->id) {
                \Session::flash('success', 'Project details updated successfully.');
                return redirect('/page-managment/projects/list');
            } else {
                \Session::flash('error', 'Error updating project details.');
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
       $projectId = $request->projectId;
        if ($projectId) {
            $project = Project::where('id', $projectId)->first();
            if ($project->id) {
                Project::destroy($projectId);
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
