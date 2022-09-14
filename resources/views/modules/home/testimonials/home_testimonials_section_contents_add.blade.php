@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Home Page - Testimonials</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Testimonials - Add</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Home Page Managment - Testimonials - Add</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/save-testimonials') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Name <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="author_name" placeholder="Enter Name" required>
                                    @if($errors->has('author_name'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('about_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <label>Designation <span class="text-danger text-bold"> * </span></label>
                                    <input type="text" class="form-control" name="author_designation" placeholder="Enter Designation" required>
                                    @if($errors->has('author_designation'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('author_designation') }}</strong>
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
                                <label>Testimonials Section Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="testimonials-editor" name="testimonials" rows="5" cols="40" class="form-control" required></textarea>
                                @if($errors->has('testimonials'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('testimonials') }}</strong>
                                    </span>
                                @endif
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
