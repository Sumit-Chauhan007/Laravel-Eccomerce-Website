<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.adminnavbar')
        <div class="content_wrapper" style="position: relative; top:10px;">
            <div class="" align="center" style="font-size: 3rem"><b><u>User Section</u></b></div><br>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                {{-- <th scope="col">Handle</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach($data as $data)
              <tr>
                <th scope="row">{{$data->name}}</th>
                <td>{{$data->email}}</td>

                @if($data->userType=="0")
                <td><a href="{{url('/admin/deleteUser',$data->id)}}">Delete</a></td>
               @else
               <td><del>Not Allowed</del></td>
               @endif
              </tr>

              @endforeach

            </tbody>
          </table>
        </div>

    </div>
</body>
@include('admin.adminscript')

</html>
