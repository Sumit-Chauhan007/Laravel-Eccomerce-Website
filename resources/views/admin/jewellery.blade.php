<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <style>
        .table td img {

            width: 85px;
            height: 102px;
        }
        .table_items tr td img {
            max-width: 100px;
            width: auto;
            height: 100px;
            object-fit: cover;
            border-radius: 0;
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
                {{-- <div class="col-2"></div> --}}
                    <table class="table table_items" align="center">
                        <thead>
                            <tr>
                                <th scope="col">Item Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action 1</th>
                                <th scope="col">Action 2</th>
                                @if ($size>0)
                                <th scope="col">Size Available</th>
                                @endif
                                <th scope="col">Trending</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <th scope="row">{{ $data->Name }}</th>
                                    <td>Rs.{{ $data->Price }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td><img src="/ItemImage/{{ $data->Image }}" alt=""></td>
                                    <td><a href="{{ url('/admin/deleteItem', $data->uuid) }}">Delete</a></td>
                                    <td><a href="{{ url('/admin/updateItem', $data->uuid) }}">Update</a></td>

                                    @if ($data->Category == '0da43750-5aec-4ad7-9799-6342e30629e7')
                                        <td>
                                            {{$data->size}}
                                        </td>
                                    @endif
                                    @if ($data->Trend == true)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
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
