@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Projects</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects - List</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Projects - List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl.No</th>
                                <th>Project Name</th>
                                <th>Project Year</th>
                                <th>Project Company</th>
                                <th>Project Location</th>
                                <th>Project Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($projects->count() > 0)
                                @foreach($projects as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ isset($value->project_name) ? $value->project_name : '-' }}</td>
                                        <td>{{ isset($value->project_year) ? $value->project_year : '-' }}</td>
                                        <td>{{ isset($value->project_company) ? $value->project_company : '-' }}</td>
                                        <td>{{ isset($value->project_location) ? $value->project_location : '-' }}</td>
                                        <td>{{ isset($value->project_category) ? $value->project_category : '-' }}</td>
                                        <td>
                                            <a href="{{ url('/page-managment/projects/edit/'. $value->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="cursor-pointer" onclick=deleteProject({{ $value->id }})>
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
    function deleteProject(projectId)
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
                    url: '/page-managment/projects/delete/'+projectId,
                    async: true,
                    data: {
                        '_token': token,
                        'projectId': projectId
                    },
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response == "Success") {
                                swal("Success!", "Project deleted successfully.", "success", {
                                    button: "Ok",
                                }).then(function () {
                                    window.location.reload();
                                });
                            }
                            if (response == "Error") {
                                swal("Error!", "Error deleting Project!.", "error", {
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
