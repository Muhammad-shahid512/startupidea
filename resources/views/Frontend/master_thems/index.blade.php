<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Startup Idea</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/assets/css/style.css') }}" />
    <!-- Fav Icon -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">
    <header>
        @include('Frontend.master_thems.nav')
    </header>


    @yield('frontend_content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-3">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark py-3 bg-2">
        <div class="container">
            <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
        </div>
    </footer>
    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    crossorigin="anonymous"></script>

    <script src="{{ asset('asset/frontend/ssets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/assets/js/custom.js') }}"></script>
</body>



</html>
