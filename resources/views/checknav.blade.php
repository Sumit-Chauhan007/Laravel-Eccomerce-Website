<div class="header_section">
    <div class="container">
        <div class="containt_main">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @auth
                    <a href="/redirects">Home</a>
                @endauth
                @guest
                    <a href="/">Home</a>
                @endguest
                <a href="{{ url('SeemoreFashion') }}">Fashion</a>
                <a href="{{ url('SeemoreElectronics') }}">Electronic</a>
                <a href="{{ url('SeemoreJewellery') }}">Jewellery</a>
            </div>
            <span> &nbsp; </span>
        </div>
    </div>
</div>
<script></script>

