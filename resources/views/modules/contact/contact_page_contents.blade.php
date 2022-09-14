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
            <form method="POST" action="{{ url('/save-contact-page-contents') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Contact Section Content <span class="text-danger text-bold"> * </span></label>
                                <textarea id="contact-editor" name="contact" rows="5" cols="40" class="form-control" required>{{ isset($contact_contents->contact_content) ? $contact_contents->contact_content : '' }}</textarea>
                                @if($errors->has('contact'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('contact') }}</strong>
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
                                <label>Contact Address <span class="text-danger text-bold"> * </span></label>
                                <textarea id="address-editor" name="address" rows="5" cols="40" class="form-control" required>{{ isset($contact_contents->contact_address) ? $contact_contents->contact_address : '' }}</textarea>
                                @if($errors->has('address'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
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
                                <label>Contact Number <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="contact_phone" placeholder="Enter Contact Number" required value="{{ isset($contact_contents->contact_phone) ? $contact_contents->contact_phone : '' }}">
                                @if($errors->has('contact_phone'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('contact_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact Email <span class="text-danger text-bold"> * </span></label>
                                <input type="email" class="form-control" name="contact_email" placeholder="Enter Contact Email" required value="{{ isset($contact_contents->contact_email) ? $contact_contents->contact_email : '' }}">
                                @if($errors->has('contact_email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('contact_email') }}</strong>
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
