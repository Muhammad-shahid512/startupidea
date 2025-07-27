<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>CareerVibe | Find Best Jobs</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/assets/css/style.css') }}" />
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">

                    <img src="{{ asset('asset/frontend/assets/images/logo.png') }}" class="img-fluid text-center"
                        style="width:50px;" />

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">StarupIdea</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

    </header>

    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-5">
                        <div class="text-center">
                            <img src="{{ asset('asset/frontend/assets/images/logo.png') }}"
                                class="img-fluid text-center" style="width:100px;" />
                        </div>
                        <form action="{{ route('user.workinginfo') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="" class="mb-2">Working title*</label>
                                <input type="text" name="working" value="{{ old('working') }}" id="working"
                                    class="form-control @error('working') is-invalid @enderror"
                                    placeholder="Enter Working title">
                                @error('working')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Own*</label>
                                <select name="working_category"
                                    class="form-control @error('working_category') is-invalid @enderror">
                                    <option value="" disabled selected>Working as</option>
                                    @foreach ($working as $record)
                                        <option value="{{ $record->id }}">{{ $record->name }}</option>
                                    @endforeach
                                    @error('working_category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mt-2" style="width:100%;">Next <i
                                    class="bi bi-arrow-right"></i></button>
                        </form>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Have an account? <a href="login.html">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer class="bg-dark py-3 bg-2">
        <div class="container">
            <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
        </div>
    </footer>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.5.1.3.min.js"></script>
    <script src="assets/js/instantpages.5.1.0.min.js"></script>
    <script src="assets/js/lazyload.17.6.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
