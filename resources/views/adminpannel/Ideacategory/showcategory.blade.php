@extends('adminpannel.admin.index')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>List Idea Category !</h4>
                <span class="ml-1"></span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <a href="{{ route('category.create') }}" class="btn btn-primary text-decoration-none">Add+</a>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <form>
                                <div class="searchbox d-flex" style="width:400px">
                                    <input class="form-control" id="search" required placeholder="Search data........"
                                        name="search" value={{ request('search') }}>
                                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                                </div>
                            </form>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $value)
                                        <tr>
                                            <th>{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td><span class="badge badge-success">on</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-xs">
                                                    <a href="{{ route('category.delete', $value->id) }}"
                                                        style="text-decoration: none;">
                                                        <i class="bi bi-trash" title="update"></i>

                                                    </a>

                                                </button>
                                                <button class="btn btn-primary btn-xs">
                                                    <a href="{{ route('category.update', $value->id) }}">
                                                        <i class="bi bi-pencil" title="update"></i>

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
