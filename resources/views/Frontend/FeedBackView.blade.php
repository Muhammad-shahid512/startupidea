@extends('Frontend.master_thems.index')

@section('frontend_content')
    <section class="section-2 bg-2 py-5">
        <div class="container">
            {{-- <h2>{{  }}</h2> --}}
            <a href="{{ route('clienthomepage') }}">
                <img src="{{ asset('asset/frontend/assets/images/arrow_back2.png') }}"
                    style="width: 30px;background-color:yellowgreen;color:whitesmoke" style="font-optical-sizing: 20px"
                    alt="">
            </a>
            <div class="row">
                <div class="col-lg-10">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="p-3 border rounded mt-0 mb-3">
                                <div class="profile_header d-flex justify-content-between align-items-center ">
                                    <div class="d-flex align-items-center">
                                        @if ($idea->getuser->profile)
                                            <img src="{{ asset('images/thumbnail/' . $idea->getuser->profile) }}"
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
                                                style="font-size: 16px;">{{ $idea->getuser->name }}</small>
                                            <p class="mb-0 text-muted" style="font-size: 14px; margin-left:15px;">
                                                {{ $idea->getuser->working }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="post_content card-body">
                                    <div class="title_content" style="width: 100%; display: flex; align-items: center;">
                                        <div style="font-weight: 900;" class="mt-3">{{ $idea->title }}</div>
                                        <div class="ms-auto">
                                            <small class="btn btn-secondary btn-sm">{{ $idea->ideacate->name }}</small>
                                        </div>
                                    </div>

                                    <p class=" mt-2">

                                        {!! nl2br(e($idea->description)) !!}

                                    </p>

                                </div>
                                <hr>

                                <h6 class="text-center" style="color:coral">Feedback</h6>

                                <div class="comments d-block mt-2">
                                    <section>
                                        <div style="width: 98%; display: flex; margin-bottom: 10px;">
                                            <form id="ajax-form" style="flex:1; display:flex;">
                                                <input type="hidden" id="idea_id" value="{{ $idea->id }}">
                                                <input type="text" id="name" name="name"
                                                    placeholder="Comments..."
                                                    style="flex: 1; padding: 6px 12px; border: 1px solid #ccc;
                                                    border-radius: 4px 0 0 4px; outline: none; font-size: 14px;">
                                                <button type="submit" class="btn btn-sm btn-outline-info"
                                                    style="border-radius: 0 4px 4px 0; padding: 6px 12px; font-size: 14px;">
                                                    Post
                                                </button>
                                            </form>
                                        </div>
                                        <div id="response-message" class="mb-2" style="color: green; font-size: 13px;">
                                        </div>

                                        <div class="user_comments">
                                            @foreach ($idea->getfeedback as $value)
                                                <div
                                                    class="profile_header d-flex justify-content-between align-items-center mt-2">
                                                    <div class="d-flex align-items-center">
                                                        @if ($value->getuser->profile)
                                                            <img src="{{ asset('images/thumbnail/' . $value->getuser->profile) }}"
                                                                alt="avatar" class="rounded-circle mr-3"
                                                                style="width: 50px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mr-3"
                                                                style="width: 60px; height: 60px; font-size: 30px; border: 1px solid #ccc;">
                                                                {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($value->getuser->name, 0, 1)) }}
                                                            </div>
                                                        @endif

                                                        <div>
                                                            <small
                                                                style="font-weight:800;margin-left:15px">{{ $value->getuser->name }}</small>
                                                            <p class="mb-0 text-muted"
                                                                style="font-size: 14px; margin-left:15px;">
                                                                {{ $value->getuser->working }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        @if (auth()->guard('user')->user()->id === $value->user_id)
                                                            <a href="{{ route('deletecomment', $value->slug) }}"
                                                                class="btn btn-danger btn-sm">Delete</a>
                                                        @endif

                                                    </div>
                                                </div>
                                                <p class="text-muted mt-2" style="font-size: 13px; font-weight:600">
                                                    {{ $value->feedback }}</p>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </section>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#ajax-form').submit(function(event) {
                event.preventDefault();

                let name = $('#name').val();
                let idea_id = $('#idea_id').val();

                if (name.trim() === '') {
                    $('#response-message').text('Please enter a comment.');
                    return;
                }

                $.ajax({
                    url: '{{ url('/postcomment') }}',
                    type: 'POST',
                    data: {
                        name: name,
                        idea_id: idea_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#response-message').text(response.message ||
                            'Comment posted successfully!');
                        $('#name').val('');
                        location.reload(true);
                    },
                    error: function(xhr) {
                        $('#response-message').text('Error: ' + (xhr.responseJSON?.message ||
                            xhr.responseText));
                    }
                });
            });
        });
    </script>
@endsection
