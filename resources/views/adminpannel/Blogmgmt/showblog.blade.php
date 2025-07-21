

@extends('adminpannel.admin.index')

@section('content')


    
     <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Blog !</h4>
                            <span class="ml-1"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
<a href="{{route("blog.create")}}" class="btn btn-primary text-decoration-none">Add+</a>
                        </ol>
                    </div>
                </div>

              <div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
        <div class="card-body">
        


            <div class="container">
            <div class="row">
          
                @foreach ($data as $record)
                <div class="col-lg-3 mb-3">
                    <div class="card">
                      <div class="icosn d-flex justify-content:end">
                         <a href="{{ route('blog.delete', $record->id) }}">
                        <i class="bi bi-trash ms-2 m-2" title="Delete"></i>
                      </a>
                        <a href="{{ route('blog.updateblog', $record->id) }}">
                        <i class="bi bi-pencil ms-2 m-2" title="update"></i>
                      </a>
    
            </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $record->title }}</h5>
                        <span class="short-text">
                                                    {{ \Illuminate\Support\Str::words($record->description, 10, '...') }}
                        </span>
                        <span class="full-text d-none"  style="text-align:justify">
                        {{$record->description}}
                        </span>
                                            <a href="javascript:void(0);" class="show-more">Show more</a>

                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

@endsection
@section('scripts')
      <script>
         $(document).ready(function(){
        $('.show-more').click(function(){
            var $cardBody = $(this).closest('.card-body');
            $cardBody.find('.short-text').toggleClass('d-none');
            $cardBody.find('.full-text').toggleClass('d-block');
            
            if($(this).text() === 'Show more'){
                $(this).text('Show less');
            } else {
                $(this).text('Show more');
            }
        });
    });
  </script>

@endsection