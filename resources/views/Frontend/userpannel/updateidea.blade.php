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
                            <form action="{{ route('user.updateideapost', $idea->slug) }}" method="post">
                                @csrf
                                <div class="mb-4">

                                    <label for="" class="mb-2">Idea Type*</label>
                                    <select name="idea_type" class="form-control">
                                        @foreach ($working_category as $value)
                                            <option value="{{ $value->id }}"
                                                @if ($idea->idea_category == $value->id) selected @endif>
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="mb-4">
                                        <label for="" class="mt-3 ">Title*</label>
                                        <input type="text" name="title" placeholder="Enter idea Title"
                                            class="form-control" value="{{ $idea->title }}">

                                    </div>
                                    <div class="mb-4">
                                        <label for="" class=" mb-2">Description*</label>
                                        <textarea name="description" class="form-control" style="height:100px;" columns="40">{{ $idea->description }}</textarea>
                                    </div>
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
