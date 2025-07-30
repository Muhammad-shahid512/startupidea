@extends('adminpannel.admin.index')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>List Of Admins !</h4>
                <span class="ml-1"></span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <a href="{{ route('addadmin') }}" class="btn btn-primary text-decoration-none">Add+</a>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">

                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($showadmin as $value)
                                        <tr>
                                            <th>{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td><span class="badge badge-success">{{ $value->email }}</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-xs">
                                                    <a href="{{ route('admindelete', $value->id) }}"
                                                        style="text-decoration: none;">
                                                        <i class="bi bi-trash" title="delete"></i>

                                                    </a>

                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#search").on('input', function() {
                if ($(this).val().length === 0) {
                    location.reload();
                    var cleanUrl = window.location.origin + window.location.pathname;
                    window.location.href = cleanUrl;
                }
            })
        })
    </script>
@endsection
