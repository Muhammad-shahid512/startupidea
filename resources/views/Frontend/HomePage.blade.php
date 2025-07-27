@extends('Frontend.master_thems.index')
@section('frontend_content')
    <section class="section-1 py-5 ">
        <div class="container">
            <div class="card border-0 shadow p-5">
                <div class="row">

                    <div class="col-md-6 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Location">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            <option value="">Engineering</option>
                            <option value="">Accountant</option>
                            <option value="">Information Technology</option>
                            <option value="">Fashion designing</option>
                        </select>
                    </div>

                    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            <a href="jobs.html" class="btn btn-primary btn-block">Search</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2 bg-2 py-5">
        <div class="container">
            <h2>Popular Ideas</h2>
            <div class="row">


                @include('Frontend.userpannel.sidebar');
                <div class="col-lg-8">

                    <div class="card border-0 shadow mb-4">

                        <div class="card-body ">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @forelse ($idea as $value)
                                <div class="p-3 border rounded mt-0 mb-3">
                                    <div class="profile_header d-flex justify-content-between align-items-center ">
                                        <div class="d-flex align-items-center">
                                            @if ($value->getuser->profile)
                                                <img src="{{ asset('images/thumbnail/' . $value->getuser->profile) }}"
                                                    alt="avatar" class="rounded-circle mr-3"
                                                    style="width: 75px; height: 80px; object-fit: cover;">
                                            @else
                                                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mr-3"
                                                    style="width: 60px; height: 60px; font-size: 30px; border: 1px solid #ccc;">
                                                    {{-- {{ strtoupper(($value->getuser->name, 0, 1)) }} --}}
                                                </div>
                                            @endif

                                            <div>
                                                <small style="font-weight:800;margin-left:15px" class="ml-2"
                                                    style="font-size: 16px;">{{ $value->getuser->name }}</small>
                                                <p class="mb-0 text-muted" style="font-size: 14px;800;margin-left:15px;">
                                                    {{ auth()->guard('user')->user()->working }}</p>
                                            </div>
                                        </div>

                                        <div>

                                            <!-- Example button or link like LinkedIn "Edit" or "More" -->
                                            {{-- <a href="#" class="btn btn-outline-primary btn-sm">Edit Profile</a> --}}
                                        </div>

                                    </div>

                                    <div class="post_content card-body">
                                        <div class="title_content" style="width: 100%; display: flex; align-items: center;">
                                            <div style="font-weight: 900;" class="mt-3">{{ $value->title }}</div>
                                            <div class="ms-auto">
                                                <small class="btn btn-secondary btn-sm"
                                                    style="">{{ $value->ideacate->name }}</small>

                                            </div>
                                        </div>

                                        <p class="short-text mt-2">
                                            @if (\Illuminate\Support\Str::wordCount($value->description) > 20)
                                                {{-- {{ $value->description }} --}}
                                                {!! nl2br(e(\Illuminate\Support\Str::words($value->description, 20, '...'))) !!}

                                                <a href="javascript:void(0);" onclick="shahid()" class="show-more">Show
                                                    more</a>
                                            @else
                                                {!! nl2br(e($value->description)) !!}
                                            @endif


                                            {{-- {{ \Illuminate\Support\Str::words($value->description, 20, '...') }} --}}

                                        </p>
                                        <p class="full-text d-none">


                                            {!! nl2br(e($value->description)) !!}
                                        </p>
                                        {{-- <a href="javascript:void(0);" onclick="shahid()" class="show-more">Show more</a> --}}

                                    </div>
                                    <hr>
                                    <a href="{{ route('viewfeedback', $value->slug) }}" class="btn btn-sm btn-info"
                                        id="viewfeedback" onclick="view()">View
                                        Feedback</a>
                                    <div class="comments d-none" id="xxl">
                                        <section class="mt-2">
                                            <div style="width: 98%; display: flex; margin-bottom: 10px;">


                                                <input type="text" name="search" placeholder="Comments..."
                                                    style="
                                                    flex: 1;
                                                    padding: 6px 12px;
                                                    border: 1px solid #ccc;
                                                    border-radius: 4px 0 0 4px;
                                                    outline: none;
                                                    font-size: 14px;
                                                ">
                                                <button class="btn btn-sm btn-outline-info"
                                                    style="
                                                        border-radius: 0 4px 4px 0;
                                                        padding: 6px 12px;
                                                        font-size: 14px;
                                                    ">
                                                    Post
                                                </button>


                                            </div>

                                            <div class="user_comments">
                                                <div class="d-flex align-items-center">
                                                    @if ($value->getuser->profile)
                                                        <img src="{{ asset('images/thumbnail/' . $value->getuser->profile) }}"
                                                            alt="avatar" class="rounded-circle mr-3"
                                                            style="width: 40px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mr-3"
                                                            style="width: 60px; height: 60px; font-size: 30px; border: 1px solid #ccc;">
                                                            {{-- {{ strtoupper(($value->getuser->name, 0, 1)) }} --}}
                                                        </div>
                                                    @endif

                                                    <div>
                                                    </div>
                                        </section>

                                    </div>
                                </div>
                            @empty
                                <h6 class="text-center"> No Idea data</h6>
                            @endforelse



                            {{-- @if ($request('show') == 'all')
                                <a href="">show less</a>
                            @else
                                <a href="">Show more</a>
                            @endif --}}
                            {{-- <div style="border: 1px solid black;border-radius: 30px" class="mt-5 mx-auto text-center p-2">
                                Show More <i class="bi bi-arrow-right"></i>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('viewfeedback').onclick = function() {
            var chat = document.getElementById('xxl');
            chat.classList.toggle('d-none');
        };
    });
</script>
