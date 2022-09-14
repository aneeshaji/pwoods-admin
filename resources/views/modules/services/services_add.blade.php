@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Services</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Services - Add</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Services - Add</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/save-services') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Main Title <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="main_title" placeholder="Enter Main Title" required>
                                    @if($errors->has('main_title'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('main_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="banner_image" required>
                                    <label class="custom-file-label" for="customFile">Choose Banner Image</label>
                                    @if($errors->has('banner_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('banner_image') }}</strong>
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
                                <div class="custom-file">
                                    <label>First Content Title <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="first_content_title" placeholder="Enter First Content Title" required>
                                    @if($errors->has('first_content_title'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('first_content_title') }}</strong>
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
                                <label>First Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="first-editor" name="first" rows="5" cols="40" class="form-control" required></textarea>
                                @if($errors->has('first'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('first') }}</strong>
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
                                <div class="custom-file">
                                    <label>Second Content Title <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="second_content_title" placeholder="Enter Second Content Title" required>
                                    @if($errors->has('second_content_title'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('second_content_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="second_content_image" required>
                                    <label class="custom-file-label" for="customFile">Choose Second Content Image</label>
                                    @if($errors->has('second_content_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('second_content_image') }}</strong>
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
                                <label>Second Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="second-editor" name="second" rows="5" cols="40" class="form-control" required></textarea>
                                @if($errors->has('second'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('second') }}</strong>
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
                                <div class="custom-file">
                                    <label>Feature Image Title 1 <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="feature_image_title_1" placeholder="Enter Feature Image Title 1" required>
                                    @if($errors->has('feature_image_title_1'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('feature_image_title_1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="feature_image_name_1" required>
                                    <label class="custom-file-label" for="customFile">Choose Feature Image - 1</label>
                                    @if($errors->has('feature_image_name_1'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('feature_image_name_1') }}</strong>
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
                                    <label>Feature Image Title 2 <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="feature_image_title_2" placeholder="Enter Feature Image Title 2" required>
                                    @if($errors->has('feature_image_title_2'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('feature_image_title_2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="feature_image_name_2" required>
                                    <label class="custom-file-label" for="customFile">Choose Feature Image - 2</label>
                                    @if($errors->has('feature_image_name_2'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('feature_image_name_2') }}</strong>
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
                                    <label>Feature Image Title 3 <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="feature_image_title_3" placeholder="Enter Feature Image Title 3" required>
                                    @if($errors->has('feature_image_title_3'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('feature_image_title_3') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="feature_image_name_3" required>
                                    <label class="custom-file-label" for="customFile">Choose Feature Image - 3</label>
                                    @if($errors->has('feature_image_name_3'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('feature_image_name_3') }}</strong>
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
