@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">About Page - Contents</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">About</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contents</li>
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
            <h6 class="m-0 font-weight-bold text-primary">About Page Managment - Contents</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/save-about-page-contents') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>About Section Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="about-editor" name="about" rows="5" cols="40" class="form-control" required>{{ isset($about_contents->about_content) ? $about_contents->about_content : ''  }}</textarea>
                                @if($errors->has('about'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('about') }}</strong>
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
                                    <input type="file" class="custom-file-input" name="banner_image">
                                    <label class="custom-file-label" for="customFile">Choose Banner Image</label>
                                    @if($errors->has('banner_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('banner_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span class="text-bold text-red">(Choose image if you want to update it)</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="about_image">
                                    <label class="custom-file-label" for="customFile">Choose About Image</label>
                                    @if($errors->has('about_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('about_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span class="text-bold text-red">(Choose image if you want to update it)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Director Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="director-editor" name="director" rows="5" cols="40" class="form-control" required>{{ isset($about_contents->director_content) ? $about_contents->director_content : ''  }}</textarea>
                                @if($errors->has('about'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="director_image">
                                    <label class="custom-file-label" for="customFile">Choose Director Image</label>
                                    @if($errors->has('director_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('director_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span class="text-bold text-red">(Choose image if you want to update it)</span>
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
