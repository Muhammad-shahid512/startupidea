<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('clienthomepage') }}">

            <img src="{{ asset('asset/frontend/assets/images/logo.png') }}" style="width: 40px" class="img-fluid"
                alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>

            </ul>
            @if (auth()->guard('user')->check())
                <a class="btn btn-outline-primary me-2" href="{{ route('user.dashboardpannel') }}">
                    {{ auth()->guard('user')->user()->name }}
                </a>
            @else
                <a class="btn btn-outline-primary me-2" href="login.html">
                    Login
                </a>
            @endif
            <a class="btn btn-primary" href="{{ route('user.dashboardpannel') }}" type="submit">Post a Job</a>
        </div>
    </div>
</nav>
