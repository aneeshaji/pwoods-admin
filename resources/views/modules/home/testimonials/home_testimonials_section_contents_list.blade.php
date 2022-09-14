@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home Page - Testimonials</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Testimonials - List</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Home Page Managment - Testimonials - List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl.No</th>
                                <th>Author Name</th>
                                <th>Author Designation</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($testimonials->count() > 0)
                                @foreach($testimonials as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ isset($value->author_name) ? $value->author_name : '-' }}</td>
                                        <td>{{ isset($value->author_designation) ? $value->author_designation : '-' }}</td>
                                        @if($value->status == 1)
                                            <td>Active</td>
                                        @endif
                                        @if($value->status == 0)
                                            <td>Inactive</td>
                                        @endif
                                        <td>{{ isset($value->created_at) ? $value->created_at : '-' }}</td>
                                        <td>
                                            <a href="{{ url('/page-managment/home/testimonials/edit/'. $value->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="cursor-pointer" onclick=deleteTestimonials({{ $value->id }})>
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
    function deleteTestimonials(testimonialId)
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
                    url: '/page-managment/home/testimonials/delete/'+testimonialId,
                    async: true,
                    data: {
                        '_token': token,
                        'testimonialId': testimonialId
                    },
                    success: function (response) {
                        console.log(response);
                        if (response) {
                            if (response == "Success") {
                                swal("Success!", "Testimonial deleted successfully.", "success", {
                                    button: "Ok",
                                }).then(function () {
                                    window.location.reload();
                                });
                            }
                            if (response == "Error") {
                                swal("Error!", "Error deleting Testimonial!.", "error", {
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
