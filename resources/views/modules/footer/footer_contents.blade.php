@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Contact Page - Contents</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Contact</a></li>
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
            <h6 class="m-0 font-weight-bold text-primary">Contact Page Managment - Contents</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/save-footer-contents') }}" enctype="multipart/form-data">
                @csrf          
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Facebook Link <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="fb_link" placeholder="Enter Facebook Link" required value="{{ isset($footer_contents->fb_link) ? $footer_contents->fb_link : '' }}">
                                @if($errors->has('fb_link'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('fb_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Instagram Link <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="insta_link" placeholder="Enter Instagram Link" required value="{{ isset($footer_contents->insta_link) ? $footer_contents->insta_link : '' }}">
                                @if($errors->has('insta_link'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('insta_link') }}</strong>
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
                                <label>Twitter Link <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="twitter_link" placeholder="Enter Twitter Link" required value="{{ isset($footer_contents->twitter_link) ? $footer_contents->twitter_link : '' }}">
                                @if($errors->has('twitter_link'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('twitter_link') }}</strong>
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
