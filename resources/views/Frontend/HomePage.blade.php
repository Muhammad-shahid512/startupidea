@extends('Frontend.master_thems.index')
@section('frontend_content')
    <section class="section-1 py-5 ">
        <div class="container">
            <div class="card border-0 shadow p-5">
                <form action="">
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
                                <button class="btn btn-primary btn-block">Search</button>
                            </div>

                        </div>



                    </div>
                </form>
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
                                    <a href="{{ route('viewfeedback', $value->slug) }}"
                                        class="btn btn-sm btn-info text-white" id="viewfeedback" onclick="view()">View
                                        Feedback</a>
                                    <div class="comments d-none" id="xxl">
                                        <section class="mt-2">



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
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.show-more').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var parent = btn.closest('.post_content'); // find container
                var shortText = parent.querySelector('.short-text');
                var fullText = parent.querySelector('.full-text');
                shortText.classList.toggle('d-none');
                fullText.classList.toggle('d-none');
                btn.textContent = fullText.classList.contains('d-none') ? 'Show more' :
                    'Show less';
            });
        });
    });
</script>
