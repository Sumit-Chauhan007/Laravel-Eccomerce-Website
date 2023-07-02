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
                                <h3 class="font-weight-bold">Welcome Sir!!</h3>
                                <h6 class="font-weight-normal mb-0">This Item is Out of Stock
                                    @if ($OutStock->count() > 0)
                                        <span class="text-primary"> You have {{ $OutStock->count() }} unread alerts!</span>
                                    @endif
                                </h6>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($OutStock as $OutStock)
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people ">
                                    <img src="/ItemImage/{{ $OutStock->Image }}" alt="people" style="width: 200px;">
                                    <div class="weather-info">
                                        <div class="d-flex">
                                            <div class="ml-2">
                                                <h4 class="location font-weight-normal">{{ $OutStock->Name }}</h4>
                                                <h4 class="location font-weight-normal">{{ $OutStock->quantity }}</h4>
                                                <a href="{{ url('/admin/updateItem', $OutStock->uuid) }}"
                                                    class="font-weight-normal">Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>&nbsp;&nbsp;
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</body>
@include('admin.adminscript')

</html>
