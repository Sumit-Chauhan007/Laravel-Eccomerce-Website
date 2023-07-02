<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')

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


            <div class="row">

                <div class="col-6">
                    <div class="" align="center" style="font-size: 3rem"><b><u>Add Items</u></b></div>
                    <form class="ClotheForm" style="margin:auto" action="{{ url('/admin/uploadItem') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="ItemsForm mb-3">
                            <label for="exampleInputTitle" class="form-label">Item Name</label>
                            <input type="text" name='ItemName' class="form-control" placeholder="Name of Item"
                                id="exampleInputTitle" aria-describedby="emailHelp" required>
                        </div>
                        <div class="ItemsForm mb-3">
                            <label for="exampleInputPrice" class="form-label">Price</label>
                            <input type="text" name='price' class="form-control" placeholder="Price of Item"
                                id="exampleInputPrice" aria-describedby="emailHelp" required>
                        </div>
                        <div class="ItemsForm mb-3">
                            <label for="exampleInputPrice12" class="form-label">Category</label>
                            <select class="form-control" name="Category" id="exampleInputPrice12" required
                                onclick="choose()">
                                <option value="">Choose </option>
                                @foreach ($AdminItemData as $AdminItemData)
                                    <option value="{{ $AdminItemData->uuid }}">{{ $AdminItemData->Category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ItemsForm mb-3 row" id="ItemsSize" style="display: none">
                            <div class="col-4 "><label for="exampleInputSize" class="form-label">Size Available:</label>
                            </div>
                            <div class="col-8 row">
                                <div class="check_col">
                                    <div class="check_field">
                                        <input type="checkbox" value="XXL" id="vehicle1" name="vehicle1[]"
                                            value="Bike">
                                        <label for="vehicle1"> XXL</label>
                                    </div>
                                    <div class="check_field">
                                        <input type="checkbox" value="XL" id="vehicle1" name="vehicle1[]"
                                            value="Bike">
                                        <label for="vehicle1"> XL</label>
                                    </div>
                                    <div class="check_field">
                                        <input type="checkbox" value="LARGE" id="vehicle1" name="vehicle1[]"
                                            value="Bike">
                                        <label for="vehicle1"> LARGE</label>
                                    </div>
                                    <div class="check_field">
                                        <input type="checkbox" value="MEDIUM" id="vehicle1" name="vehicle1[]"
                                            value="Bike">
                                        <label for="vehicle1"> MEDIUM</label>
                                    </div>
                                    <div class="check_field">
                                        <input type="checkbox" value="SMALL" id="vehicle1" name="vehicle1[]"
                                            value="Bike">
                                        <label for="vehicle1">SMALL</label>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function choose() {
                                    var b = document.getElementById("exampleInputPrice12").value;
                                    if (b == "0da43750-5aec-4ad7-9799-6342e30629e7") {
                                        $("#ItemsSize").show();
                                    } else {
                                        $("#ItemsSize").hide();
                                    }
                                }
                            </script>

                        </div>
                        <div class="ItemsForm mb-3 row">
                            <div class="col-6">
                                <label for="exampleInputImage" class="form-label">Image</label>
                                <input type="file" name='image' class="form-control" id="exampleInputImage"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-6">
                                <label for="exampleInputQuantity" class="form-label">Quantity</label>
                                <input type="number" style="height:2.5rem" name='quantity' class="form-control" id="exampleInputQuantity"
                                    aria-describedby="emailHelp" min="0" required>
                            </div>
                        </div>
                        <div class="HighlightCheck ItemsForm mb-3">
                            <input type="checkbox" class="form-check-input" name="trending" id="exampleCheck1">
                            <label class="form-check-labels" for="exampleCheck1">Trending</label>
                        </div>


                        <button style="color: #4B49AC" type="submit"
                            class="clotheForm_btn btn btn-primary">Upload</button>
                    </form>
                </div>
                <div class="col-6">
                    <div class="" align="center" style="font-size: 3rem"><b><u>Add Category</u></b></div>
                    <form class="ClotheForm" style="margin:auto" action="{{ url('/admin/Category') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="ItemsForm mb-3">
                            <label for="exampleInputTitle" class="form-label">Category Name</label>
                            <input type="text" name='CategoryName' class="form-control"
                                placeholder="Name of Category" id="exampleInputTitle" aria-describedby="emailHelp"
                                required>
                        </div>
                        <div class="ItemsForm mb-3">
                            <label for="exampleInputTitle" class="form-label">Category Title</label>
                            <input type="text" name='CategoryTitle' class="form-control"
                                placeholder="Name of Category" id="exampleInputTitle" aria-describedby="emailHelp"
                                required>
                        </div>
                        <button style="color: #4B49AC" type="submit"
                            class="clotheForm_btn btn btn-primary">Upload</button>
                    </form>


                </div>
            </div>
        </div>
        <div> &nbsp;</div>
    </div>

    </div>
    </div>
</body>
@include('admin.adminscript')

</html>
