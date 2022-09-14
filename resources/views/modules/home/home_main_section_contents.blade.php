@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home Page - Main</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Section - Main</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Home Page Managment - Main Banner Images</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/save-banner-images') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_image_1" required>
                                            <label class="custom-file-label" for="customFile">Choose First Banner Image</label>
                                            @if($errors->has('banner_image_1'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('banner_image_1') }}</strong>
                                                </span>
                                            @endif
                                            <span class="text-bold text-red">(Choose image if you want to update it)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="banner_image_2" required>
                                            <label class="custom-file-label" for="customFile">Choose Second Banner Image</label>
                                            @if($errors->has('banner_image_2'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('banner_image_2') }}</strong>
                                                </span>
                                            @endif
                                            <span class="text-bold text-red">(Choose image if you want to update it)</span>
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
