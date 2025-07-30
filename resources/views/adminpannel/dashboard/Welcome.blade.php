@extends('adminpannel.admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Login Users </div>
                            <div class="stat-digit">{{ $totalusers }}</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total ideas 💡 </div>
                            <div class="stat-digit">{{ $totalideas }}</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Feedback </div>
                            <div class="stat-digit"> {{ $totalfeedback }}</div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- /# column -->
        </div>
    @endsection
