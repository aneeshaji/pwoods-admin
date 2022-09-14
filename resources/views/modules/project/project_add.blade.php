@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Projects</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Projects - Add</li>
      </ol>
    </div>
    @if(Session::has('success'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert {{ Session::get('alert-class', 'alert-danger') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Projects - Add</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/save-projects') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Project Name <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="project_name" placeholder="Enter Project Name" required>
                                    @if($errors->has('project_name'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Project Year <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="project_year" placeholder="Enter Project Year" required>
                                    @if($errors->has('project_year'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Project Company <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="project_company" placeholder="Enter Project Company" required>
                                    @if($errors->has('project_company'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Project Location <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="project_location" placeholder="Enter Project Location" required>
                                    @if($errors->has('project_location'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Project Category <span class="text-danger text-bold"> * </span></label>
                                    <select class="form-control mb-3" name="project_category" required>
                                        <option value="" disabled selected>-Select-</option>
                                        <option value="interior">Interior</option> 
                                        <option value="exterior">Exterior</option>
                                        <option value="urban">Urban</option>  
                                    </select>
                                    @if($errors->has('project_category'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image</label>
                                    @if($errors->has('project_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Project Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="project-editor" name="project" rows="5" cols="40" class="form-control" required></textarea>
                                @if($errors->has('project'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('project') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image_1" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image - 1</label>
                                    @if($errors->has('project_image_1'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image_1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image_2" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image - 2</label>
                                    @if($errors->has('project_image_2'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image_2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image_3" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image - 3</label>
                                    @if($errors->has('project_image_3'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image_3') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image_4" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image - 4</label>
                                    @if($errors->has('project_image_4'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image_4') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image_5" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image - 5</label>
                                    @if($errors->has('project_image_5'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image_5') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="project_image_6" required>
                                    <label class="custom-file-label" for="customFile">Choose Project Image - 6</label>
                                    @if($errors->has('project_image_6'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('project_image_6') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
