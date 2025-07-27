    <div class="col-lg-3">
        <div class="card border-0 shadow mb-4 p-3">
            <div class="s-body text-center mt-3">


                @if (auth()->guard('user')->user()->profile)
                    <img src="{{ asset('images/thumbnail/' . auth()->guard('user')->user()->profile) }}" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                @else
                    <div class=" rounded-circle  text-white bg-secondary mx-auto text-black d-flex align-items-center justify-content-center"
                        style="width: 150px; height: 150px; font-size: 50px; color: black; border: 1px solid black;">
                        {{ strtoupper(substr(auth()->guard('user')->user()->name, 0, 1)) }}
                    </div>
                @endif

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('user.profileupdate') }}" method="Post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="image" name="profile">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mx-3">Update</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="mt-3 pb-0">{{ auth()->guard('user')->user()->name }}
                    {{ auth()->guard('user')->user()->last_name }}</h5>
                <p class="text-muted mb-1 fs-6 mt-2">{{ auth()->guard('user')->user()->working }}</p>
                <div class="d-flex justify-content-center mb-2">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                        class="btn btn-primary">Change Profile Picture</button>
                </div>
            </div>
        </div>
        <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
            <div class="card-body p-0">
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item d-flex justify-content-between p-3">
                        <a href="{{ route('user.accountsetting') }}">Account Settings</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <a href="{{ route('user.ideaform') }}">Post a Idea</a>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center p-3 
                         {{ request()->routeIs('user.getidea') ? 'active-item' : 'no-active-items' }}">
                        <a href="{{ route('user.getidea') }}">My Ideas</a>
                    </li>


                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <a href="job-applied.html"> Extrem Idea</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <a href="saved-jobs.html">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
