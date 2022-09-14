@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">About Page - Partners</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">About</a></li>
        <li class="breadcrumb-item active" aria-current="page">Partners</li>
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
            <h6 class="m-0 font-weight-bold text-primary">About Page Managment - Partners</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/save-about-page-partners') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Partners Section Title <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="partners_title" placeholder="Enter Partners Section Title" required value="{{ isset($partners_contents->partners_title) ? $partners_contents->partners_title : '' }}">
                                @if($errors->has('partners_title'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('partners_title') }}</strong>
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
                                <label>Partners Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="partners-editor" name="partners" rows="5" cols="40" class="form-control" required>{{ isset($partners_contents->partners_content) ? $partners_contents->partners_content : '' }}</textarea>
                                @if($errors->has('partners'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('partners') }}</strong>
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
