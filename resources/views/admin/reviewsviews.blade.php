<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <style>
        .table td img {

            width: 85px;
            height: 102px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.adminnavbar')
        <div class="content_wrapper" style="position: relative; top:10px;">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    Upload Validation Error <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <div class="" align="center" style="font-size: 3rem"><b><u>{{ $Name }}</u></b></div><br>
            <div class="row">
                <div class="col-2"></div>
                <table class="table col-8">
                    <thead>
                        <tr>
                            <th scope="col">User Name</th>
                            <th scope="col">Review</th>
                            <th scope="col">Action 1</th>
                            <th scope="col">Action 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviewsForAdmin as $data)
                            <tr>
                                <th scope="row">{{ $data->username }}</th>
                                <td>{{ $data->Review }}</td>
                                @if ($data->Added == true)
                                <td><a href="{{ url('/admin/addReview', $data->uuid) }}">Remove from website</a></td>
                                @else
                                <td><a href="{{ url('/admin/addReview', $data->uuid) }}">Add to website</a></td>
                                @endif

                                <td><a href="{{ url('/admin/deleteReview', $data->uuid) }}">Delete</a></td>
                            </tr>
                        @endforeach

                </table>

                <div> &nbsp;</div>
            </div>

        </div>
    </div>

</body>
@include('admin.adminscript')

</html>
