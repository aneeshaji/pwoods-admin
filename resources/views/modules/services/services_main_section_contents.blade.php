@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Services Page - Main</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services - Main</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Services - Main</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/save-services-main-contents') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <label>Main Title <span class="text-danger text-bold"> * </span></label>
                                            <input type="text" class="form-control" name="main_title" placeholder="Enter Main Title" value="{{ isset($services_contents->main_title) ? $services_contents->main_title : ''  }}" required>
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
                                            <input type="file" class="custom-file-input" name="banner_image">
                                            <label class="custom-file-label" for="customFile">Choose Services Banner Image</label>
                                            @if($errors->has('banner_image'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('banner_image') }}</strong>
                                                </span>
                                            @endif
                                            <span class="text-bold text-red">(Choose image if you want to update it)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Services Section Content <span class="text-danger text-bold"> * </span></label>
                                        <textarea id="services-editor" name="services" rows="5" cols="40" class="form-control" required>{{ isset($services_contents->main_content) ? $services_contents->main_content : ''  }}</textarea>
                                        @if($errors->has('services'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('services') }}</strong>
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
