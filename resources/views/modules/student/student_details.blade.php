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
            <h6 class="m-0 font-weight-bold text-primary">Student Details</h6>
          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Student First Name </label>
                                <input type="text" class="form-control" name="student_first_name" value="{{ isset($student->student_first_name) ? $student->student_first_name : '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Student Last Name </label>
                                <input type="text" class="form-control" name="student_last_name" value="{{ isset($student->student_last_name) ? $student->student_last_name : '' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Student Class <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="student_last_name" value="{{ isset($student->studentClass) ? $student->studentClass[0]->class_name : '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marks - Maths <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="marks_maths" value="{{ isset($student->marks_maths) ? $student->marks_maths : '' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marks - Physics <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="marks_physics" value="{{ isset($student->marks_physics) ? $student->marks_physics : '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marks - Chemistry <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="marks_chemistry" value="{{ isset($student->marks_chemistry) ? $student->marks_chemistry : '' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="phone" value="{{ isset($student->phone) ? $student->phone : '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger text-bold"> * </span></label>
                                <input type="text" class="form-control" name="email" value="{{ isset($student->email) ? $student->email : '' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
