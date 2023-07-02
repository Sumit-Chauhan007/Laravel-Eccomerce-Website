<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
       @include("admin.admincss")

</head>

<body>
    <div class="container-scroller">
    @include("admin.adminnavbar")
    <div class="container"  style="position: relative; top:10px;right:-50px">
        <div class="container" align="center" style="font-size: 3rem"><b><u>Clothing Section</u></b></div><br>
   <div class="row">
    <form  action="{{url('/admin/updatedItems',$data->uuid)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputTitle" class="form-label">Clothe Name</label>
          <input type="text" name='Name' class="form-control" value="{{$data->Name}}"  id="exampleInputTitle" aria-describedby="emailHelp" required >
         </div>
        <div class="mb-3">
          <label for="exampleInputQuantity" class="form-label">Quantity</label>
          <input type="text" name='Quantity' class="form-control" value="{{$data->quantity}}" id="exampleInputQuantity" aria-describedby="emailHelp" required>
         </div>
        <div class="mb-3">
          <label for="exampleInputPrice" class="form-label">Price</label>
          <input type="text" name='Price' class="form-control" value="{{$data->Price}}" id="exampleInputPrice" aria-describedby="emailHelp" required>
         </div>
        <div class="mb-3">
          <label for="exampleOldImage" class="form-label">Old Image</label>
          <img id="exampleOldImage" src="/ItemImage/{{$data->Image}}" alt="">
          <label for="exampleInputImage" class="form-label">New Image</label>
          <input type="file" name='Image' class="form-control" id="exampleInputImage" aria-describedby="emailHelp" >
         </div>
         <div class="HighlightCheck mb-3">
            <input type="checkbox" class="form-check-input"  name="trending"  id="exampleCheck1">
            <label class="form-check-label"  for="exampleCheck1">Trending</label>
        </div>


        <button style="color: #4B49AC" type="submit" class="clotheForm btn btn-primary">Update</button>
        <div>&nbsp;</div>
      </form>
    </body>
    @include("admin.adminscript")
</html>
