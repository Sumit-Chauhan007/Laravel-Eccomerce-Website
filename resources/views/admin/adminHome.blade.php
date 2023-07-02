<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.adminnavbar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Welcome Sir</h3>
                                <h6 class="font-weight-normal mb-0">All systems are running smoothly! Happy to see
                                    you😃😉</h6>

                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="justify-content-end d-flex">
                                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                        <button class="btn btn-sm btn-light bg-white " id="dropdownMenuDate2"
                                            aria-haspopup="true" aria-expanded="true">
                                            <input style="border:none" id="today" type="date">
                                        </button>
                                    </div>
                                    <script>
                                        let today = new Date().toISOString().substr(0, 10);
                                        document.querySelector("#today").value = today;
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-12 mb-5 stretch-card transparent" style="height: 293px">
                                <div class="card card-tale" align="right"
                                    style="background: url('people1.png');background-size: contain;;background-repeat: no-repeat;background-position: center;color: black;">
                                </div>
                            </div>
                            <div class="col-md-12  stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <div class="row" style="width:100%">
                                            <p class="col-12 fs-30 mb-4">Total Reviews</p>
                                            @foreach ($Category as $cat)
                                                <?php
                                                $totalrev = DB::table('reviews')->where('Category_id',$cat->uuid)->count();
                                                ?>
                                                <p class="col-4 fs-25 mb-2">{{$cat->Category}} :
                                                    {{ $totalrev }}
                                                </p>
                                            @endforeach
                                            <p class="col-12 mt-5">Go to sidebar to see all reviews according to category
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4">Total Orders</p>
                                        <?php
                                        $totalorder = DB::table('orders')->count();
                                        ?>
                                        <p class="fs-30 mb-2">{{ $totalorder }}</p>
                                        <p><a href="/admin/Orders">view</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <?php
                                        $totaluser = DB::table('users')
                                            ->where('userType', 0)
                                            ->count();
                                        ?>
                                        <p class="mb-4">Total Users</p>
                                        <p class="fs-30 mb-2">{{ $totaluser }}</p>
                                        <p><a href="/admin/users">view</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <?php
                                        $totalitems = DB::table('items')->count();
                                        ?>
                                        <p class="mb-4">Total Items</p>
                                        <p class="fs-30 mb-2">{{ $totalitems }}</p>
                                        <p>Go to sidebar to see items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <?php
                                        $totalcat = DB::table('categories')->count();
                                        ?>
                                        <p class="mb-4">Total Categories</p>
                                        <p class="fs-30 mb-2">{{ $totalcat }}</p>
                                        <p>Go to sidebar to see categories</p>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="col-md-12 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <div style="width:33%">
                                        <p class=" fs-30 mb-4">Total Users</p>
                                        <p class="fs-25 mb-2">Today:&nbsp;&nbsp;&nbsp;&nbsp; {{ $count['daily'] }}
                                        </p>
                                        <p class="fs-25 mb-2">Weekly:&nbsp;&nbsp; {{ $count['weekly'] }}</p>
                                        <p class="fs-25 mb-2">Monthly:&nbsp;&nbsp;{{ $count['monthly'] }}</p>
                                        <p style="font-size: 25px"><a href="/admin/users"><u>view</u></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Order Details</p>
                                <div class="d-flex flex-wrap mb-5">
                                    <div class="mr-5 mt-3">

                                        <p class="text-muted">Orders</p>
                                        <h3 class="text-primary fs-30 font-weight-medium">{{ $totalorder }}</h3>
                                    </div>
                                    <div class="mr-5 mt-3">
                                        <p class="text-muted">Users</p>
                                        <h3 class="text-primary fs-30 font-weight-medium">{{ $totaluser }}</h3>
                                    </div>

                                </div>
                                @include('admin.salesGraph')
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="card-title">Sales Report</p>
                                    <a href="#" class="text-info">View all</a>
                                </div>
                                <p class="font-weight-500">The total number of sessions within the date range. It is the
                                    period time a user is actively engaged with your website, page or app, etc</p>
                                <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            {{-- <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                        Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                        from BootstrapDash. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                        <i class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer> --}}
            <!-- partial -->
        </div>
    </div>
</body>
@include('admin.adminscript')

</html>
