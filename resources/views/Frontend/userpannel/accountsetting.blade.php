@extends('Frontend.master_thems.index')
@section('frontend_content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">My Jobs</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">

                @include('Frontend.userpannel.sidebar')

                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body  p-4">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h3 class="fs-4 mb-1">My Profile</h3>
                            @if (auth()->guard('user')->user()->profile)
                                <img src="{{ asset('images/thumbnail/' . auth()->guard('user')->user()->profile) }}"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            @else
                                <div class=" rounded-circle bg-secondary  text-black d-flex align-items-center justify-content-center"
                                    style="width: 100px; height: 100px; font-size: 50px; color: black; border: 1px solid black;">
                                    {{ strtoupper(substr(auth()->guard('user')->user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <br>
                            @if (auth()->guard('user')->user()->profile)
                                <a href="{{ route('user.removeprofile') }}" class="mb-3 btn btn-primary">Remove Profile</a>
                            @else
                            @endif

                            <form action="{{ route('user.accountupdate') }}" method="post">
                                @csrf


                                <div class="mb-4">
                                    <label for="" class="mb-2">Name*</label>
                                    <input type="text" name="name" placeholder="Enter Name" class="form-control"
                                        value="{{ auth()->guard('user')->user()->name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Last Name*</label>
                                    <input type="text" name="last_name" placeholder="Enter Email" class="form-control"
                                        value="{{ auth()->guard('user')->user()->last_name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" name="email" placeholder="Enter Email" class="form-control"
                                        value="{{ auth()->guard('user')->user()->email }}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">working*</label>
                                    <input type="text" name="working" placeholder="Enter Email" class="form-control"
                                        value="{{ auth()->guard('user')->user()->working }}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Working Category*</label>
                                    <select name="working_category" class="form-control">
                                        @foreach ($cate as $value)
                                            <option value="{{ $value->id }}"
                                                @if (auth()->guard('user')->user()->working_category == $value->id) selected @endif>
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
