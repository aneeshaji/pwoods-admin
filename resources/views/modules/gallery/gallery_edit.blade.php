@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gallery - Edit</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Gallery - Edit</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/page-managment/gallery/update/'. $gallery->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Image Title <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="image_title" value="{{ isset($gallery->image_title) ? $gallery->image_title : '' }}" required>
                                    @if($errors->has('image_title'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('image_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file mt-32">
                                    <input type="file" class="custom-file-input" name="gallery_image">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                    @if($errors->has('gallery_image'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('gallery_image') }}</strong>
                                        </span>
                                    @endif
                                    <span class="text-bold text-red">(Choose image if you want to update it)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
