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
                    <h6 class="m-0 font-weight-bold text-primary">Students List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl.No</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Total Mark</th>
                                <th>Rank</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($students->count() > 0)
                                @foreach($students as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ isset($value->student_first_name) ? $value->student_first_name : '-' }}</td>
                                        <td>{{ isset($value->studentClass[0]) ? $value->studentClass[0]->class_name : '-' }}</td>
                                        <td>{{ isset($value->total_marks) ? $value->total_marks : '-' }}</td>
                                        <td>{{ isset($value->rank) ? $value->rank : '-' }}</td>
                                        <td>
                                            <a href="{{ url('students/details/'.encrypt($value->id)) }}" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="cursor-pointer" onclick=deleteStudent({{ $value->id }})>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="6" class="text-bold text-danger text-center">
                                    No Data Found
                                </td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let token = "{{ csrf_token() }}";
    function deleteStudent(studentId)
    {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({type: "DELETE",
                    url: '/students/id',
                    async: true,
                    data: {
                        '_token': token,
                        'studentId': studentId
                    },
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response == "Success") {
                                swal("Success!", "Student deleted successfully.", "success", {
                                    button: "Ok",
                                }).then(function () {
                                    window.location.reload();
                                });
                            }
                            if (response == "Error") {
                                swal("Error!", "Error deleting Student!.", "error", {
                                    button: "Ok",
                                })
                            }
                        } else {
                            console.log("Error");
                        }
                    }
                });
            } else {
                swal("Cancelled!", "You cancelled the operation.", "error", {
                    button: "Ok",
                })
            }
        });
    }
</script>
@endsection
