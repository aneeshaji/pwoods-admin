@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Students</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Students</li>
      </ol>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create Student</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('students') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Student First Name <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="student_first_name" placeholder="Enter Student First Name" required>
                                @if($errors->has('student_first_name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('student_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Student Last Name <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="student_last_name" placeholder="Enter Student Last Name" required>
                                @if($errors->has('student_last_name'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('student_last_name') }}</strong>
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
                                <label>Student Class <span class="text-danger text-bold"> * </span></label>
                                <select class="form-control mb-3" name="student_class" required>
                                    <option value="" disabled selected>-Select-</option>
                                    @foreach($student_classes as $val)
                                        <option value="{{ $val->id }}">{{ $val->class_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('student_class'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('student_class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marks - Maths <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="marks_maths" placeholder="Enter Mark - Maths" required>
                                @if($errors->has('marks_maths'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('marks_maths') }}</strong>
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
                                <label>Marks - Physics <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="marks_physics" placeholder="Enter Marks - Physics" required>
                                @if($errors->has('marks_physics'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('marks_physics') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marks - Chemistry <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="marks_chemistry" placeholder="Enter Marks - Chemistry" required>
                                @if($errors->has('marks_chemistry'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('marks_chemistry') }}</strong>
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
                                <label>Phone <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone" required>
                                @if($errors->has('phone'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger text-bold"> * </span></label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
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
                                <label>Password <span class="text-danger text-bold"> * </span></label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                                @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirm Password <span class="text-danger text-bold"> * </span></label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" required>
                                @if($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
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
                                        <input type="file" class="custom-file-input" name="profile_image" required>
                                        <label class="custom-file-label" for="customFile">Choose Profile Image</label>
                                        @if($errors->has('profile_image'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('profile_image') }}</strong>
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
