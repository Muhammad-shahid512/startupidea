@extends('adminpannel.admin.index')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Create admin !</h4>
                <span class="ml-1"></span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <a href="{{ route('blog.show') }}" class="btn btn-primary text-decoration-none">show</a>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-xxl-12">

            <div class="card">

                <div class="card-body">
                    <div class="basic-form">
                        <form action={{ route('adminpost') }} method="post">
                            @csrf
                            <lable>Name</lable>
                            <div class="form-group mt-2">
                                <input class="form-control"name="name" type="text" required placeholder="">

                            </div>
                            <lable>Email</lable>
                            <div class="form-group mt-2">
                                <input type="email" name="email" class="form-control" required></input>
                            </div>
                            <lable>passwors</lable>
                            <div class="form-group mt-2">
                                <input type="password" name="password" class="form-control" required></input>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
@endsection
@section('scripts')
    <script>
        $('#ajax-form').submit(function(e) {
            e.preventDefault();

            var url = $(this).attr("action");
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert('Form submitted successfully');
                    location.reload();
                },

                error: function(response) {
                    $('#ajax-form').find(".print-error-msg").find("ul").html('');
                    $('#ajax-form').find(".print-error-msg").css('display', 'block');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#ajax-form').find(".print-error-msg").find("ul").append('<li>' +
                            value + '</li>');
                    });
                }
            });

        });
    </script>
@endsection
