@include('layouts.admin.header')

<body class="sb-nav-fixed">
    @include('layouts.admin.navbar')
    <div id="layoutSidenav">
        @include('layouts.admin.sidebar')
        <div id="layoutSidenav_content" class="">
            {{-- @include('layouts.admin.body') --}}
            <div class="p-3">
                <div class="row ">
                    <div class="col-md-12">
                        <h3> Hello, {{ auth()->user()->name }}</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        @if (Session::has('terminated'))
                            <div class="alert alert-warning">{{ Session::get('terminated') }}</div>
                        @endif
                        @if (Auth::check() && auth()->user()->user_type === 'employer')
                            <p> Your trial
                                {{ now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expried' : 'will expire' }}
                                on
                                {{ auth()->user()->user_trial }}</p>
                        @endif
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <p class="text-center mt-3 lead">
                                User profile
                            </p>
                            <button class="btn btn-primary float-end">View</button>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <p class="text-center mt-3 lead">
                                Post job
                            </p>
                            <button class="btn btn-primary float-end">View</button>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter success">
                            <p class="text-center mt-3 lead">
                                All jobs
                            </p>
                            <button class="btn btn-primary float-end">View</button>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter info">
                            <p class="text-center mt-3 lead">
                                Item
                            </p>
                            <button class="btn btn-primary float-end">View</button>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
    <style>
        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 130px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter.primary {
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger {
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success {
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info {
            background-color: #26c6da;
            color: #FFF;
        }
    </style>
</body>

</html>
