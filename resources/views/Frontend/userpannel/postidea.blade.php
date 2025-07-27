@extends('Frontend.master_thems.index')
@section('frontend_content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Post Ideas</li>
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

                            <h3 class="fs-4 mb-1">Add Idea </h3>
                            <form action="{{ route('user.ideapost') }}" method="post">
                                @csrf
                                <div class="mb-4">

                                    <label for="" class="mb-2">Idea Type*</label>
                                    <select name="idea_type" class="form-control  @error('idea_type') is-invalid @enderror">
                                        <option value="" disabled selected>Select Idea Type</option>

                                        @foreach ($ideacategory as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                            @error('idea_type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        @endforeach
                                    </select>
                                    <div class="mb-1">
                                        <label for="" class="mt-3 mb-2">Title*</label>
                                        <input type="text" name="title" placeholder="Enter idea Title"
                                            class="form-control  @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="mt-3 mb-2">Description*</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" style="height:100px;"
                                            columns="40"></textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
