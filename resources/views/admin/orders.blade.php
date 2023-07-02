<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.adminnavbar')
        <div class="content_wrapper" style="position: relative; top:10px;">
            <div class="" align="center" style="font-size: 3rem"><b><u>Orders Section</u></b></div>
            <div align="right">
                <select name="" id="">
                    <option value="">Payment Method</option>
                    <option value="COD" >Cash On Delivery</option>
                    <option value="Online">Online</option>
                </select>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">User email</th>
                        <th scope="col">Adress</th>
                        <th scope="col">City</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Order Date & Time</th>
                        <th scope="col">Payment Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Orders as $data)
                        <tr>
                            <?php
                            $Name = DB::table('users')
                                ->where('id', $data->user_id)
                                ->first();
                            $Items = DB::table('items')
                                ->where('uuid', $data->item_uuid)
                                ->first();
                            ?>
                            <th>{{ $data->user_name }}</th>
                            <th>{{ $Name->email }}</th>
                            <td>{{ $data->user_address }}</td>
                            <td>{{ $data->user_city }}</td>
                            <td>{{ $Items->Name }}</td>
                            <td>Rs.{{ $Items->Price }}</td>
                            <td>{{ $Items->created_at }}</td>
                            <td>{{ $data->Payment_method }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</body>
@include('admin.adminscript')

</html>
