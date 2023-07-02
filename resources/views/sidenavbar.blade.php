<div id="invisible_div" onclick="KeyOut()"
    style="position: absolute;z-index: 99;width:100%;height:100%;background-color:rgba(0,0,0,0.5);top:0px;left:0px;display:none">
</div>
<div class="header_section">
    <div class="container mt-3">
        <div class="containt_main">
            <div>
                <div id="mySidenav" class="sidenav" style="z-index: 11;">
                    <?php
                    $catname = DB::table('categories')->get();
                    ?>
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    @auth
                        <a class="navbar-brand" href="/redirects" style="margin: 0;"><img src="finallogos.png"
                                style="width: 115px;" alt="thfhgv">
                        </a>
                    @endauth
                    @guest
                        <a class="navbar-brand" href="/" style="margin: 0;"><img src="finallogos.png"
                                style="width: 115px;" alt="jhy">
                        </a>
                    @endguest
                    @auth
                        <a href="/redirects">Home</a>
                    @endauth
                    @guest
                        <a href="/">Home</a>
                    @endguest
                    @foreach ($catname as $name)
                        <a href="{{ url('SeemoreItems', $name->uuid) }}">{{ $name->Category }}</a>
                    @endforeach
                    <a href="{{ url('myOrders') }}">My Orders</a>
                </div>
                <div class="sidenav" id="closesidenav"
                    style="z-index:10;width:100%;display:none;background-color: rgba(0,0,0,0.5);height: 100vh;"></div>
            </div>

            {{-- <script>
                window.location.href = '/shipping';
            </script> --}}


            <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
            <div class="dropdown cat-menu-dis">
                <button class="btn btn-secondary Category dropdown-toggle" style="height: 42px" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                </button>
                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                    @foreach ($catname as $cname)
                        <a class="dropdown-item"
                            href="{{ url('SeemoreItems', $cname->uuid) }}">{{ $cname->Category }}</a>
                    @endforeach
                </div>
            </div>
            <div class="main " id="zIndexm">
                <div class="SearchForm">
                    <div class="input-group row search_input" onclick="Visible()" style="z-index: 9;">
                        <input autocomplete="off" type="text" list="Items_Names" id="Search_name" name="Search_name"
                            class="form-control col-11" onkeyup="KeySearch()" placeholder="Search this blog">
                        <div class="input-group-append col-1">
                            <form method="POST" action="/searchprod">
                                @csrf
                                <input type="hidden" name="searcharr[]" value="" id="hiddeninputsearch">
                                <button type="submit" class="btn btn-secondary" id="Submit_button"
                                    style="background-color:#000; border-color:#000 ;height:42px" disabled>
                                    <i class="fa fa-search" ></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-12 search_bar" id="search_div_id" style="overflow: hidden;">
                            <ul style="max-width:94.4%;margin-left: -14px;" id="search_span_id"
                                class="search_span col-12"></ul>

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="header_box">

                <div class="login_menu">
                    <ul>
                        <li>
                            <a href="{{ url('showcart') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <sub class="count" style="border-radius: 100%">{{ $count }}</sub></a>
                        </li>

                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<script>
    function KeyOut() {
        document.getElementById("zIndexm").style.zIndex = 0;
        document.getElementById("invisible_div").style.display = "none";
        document.getElementById('search_span_id').style.display = 'none';
    }

    function ClicktoSearch(id) {
        $.ajax({
            type: "get",
            url: "{{ url('BuyNow') }}" + '/' + id,
            contentType: 'multipart/form-data',
        });

    }

    function KeySearch() {
        if (document.getElementById('Search_name').value === "") {
            document.getElementById('Submit_button').disabled = true;
            document.getElementById('Submit_button').style.backgroundColor = '#000';
            document.getElementById('Submit_button').style.borderColor = '#000';
            document.getElementById('search_span_id').style.backgroundColor = 'transparent';

        } else {
            document.getElementById('Submit_button').disabled = false;
            document.getElementById('Submit_button').style.backgroundColor = '#f26522';
            document.getElementById('Submit_button').style.borderColor = '#f26522';
            document.getElementById('search_span_id').style.backgroundColor = '#fff';
            document.getElementById('search_span_id').style.display = 'block';

        }
        $value = $('#Search_name').val();

        $.ajax({
            type: "get",
            url: "/search",
            contentType: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'search': $value
            },
            success: function(response) {
                $guide = response.output;
                if ($guide) {
                    // alert(response.output)
                    $('.search_span').html(response.output);
                    console.log(response.data);
                    var product_data = response.data;

                    // $('#hiddeninputsearch').val(product_data);
                    document.getElementById('hiddeninputsearch').value = product_data;


                }
            }
        });

    }
</script>
<script>
    function Visible() {
        document.getElementById("zIndexm").style.zIndex = 99;

        document.getElementById("invisible_div").style.display = "block";
    }

    $('.toggle_icon').click(
        function() {
            $("#search_div_id").css('display', 'block');
        })
</script>
