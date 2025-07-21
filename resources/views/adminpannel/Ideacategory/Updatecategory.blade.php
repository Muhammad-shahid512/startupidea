@extends('adminpannel.admin.index')

@section('content')
    
     <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Create Blog !</h4>
                            <span class="ml-1"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
<a href="{{route('category.show')}}" class="btn btn-primary text-decoration-none">show</a>
                        </ol>
                    </div>
                </div>

                                   
                <div class="row">
                        <div class="col-xl-12 col-xxl-12">
                              
                <div class="card">
                           
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action={{route("category.updatepost",$data->id)}} method="post">
                                    @csrf
                                    <lable>Idea Cateogry Title</lable>
                                        <div class="form-group mt-2">
                                            <input value="{{$data->name}}" class="form-control form-control-lg @error('name') is-invalid @enderror"name="name" type="text" placeholder="">
                                      @error('name')
    <div class="text text-danger">{{ $message }}</div>
@enderror
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
                type:'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert('Form submitted successfully');
                    location.reload();
                },
                
                error: function(response){
                    $('#ajax-form').find(".print-error-msg").find("ul").html('');
                    $('#ajax-form').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        $('#ajax-form').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
           });
        
    });
  </script>

@endsection