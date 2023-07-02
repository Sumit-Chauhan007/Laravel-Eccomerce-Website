<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>S-basket</title>

<!-- plugins:css -->
<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/assets/js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ URL::asset('admin/assets/css/vertical-layout-light/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ URL::asset('finallogos-favicon.png') }}" />
<style>
    .sidebar {
        box-shadow: 1px 1px 10px grey;
    }

    .clotheForm:hover {
        color: white !important;

    }



    .content_wrapper {
        width: calc(100% - 235px);
        padding: 0 50px 50px;
    }

    .HighlightCheck.mb-3 {
        margin-left: 22px;
        margin-top: -15px;
    }

    .table td img {

        width: 85px;
        height: 102px;
    }

    form.ClotheForm {
        border: 1px solid #ccc;
        padding: 20px 40px;
        background-color: #fbfbfb;
    }

    form.ClotheForm .ItemsForm label {
        font-size: 18px;
    }

    form.ClotheForm .ItemsForm input {
        border-color: #ccc;
    }

    button.clotheForm_btn.btn.btn-primary {
        background-color: #4B49AC;
        color: white !important;
        transition: 0.4s;
        font-size: 16px
    }

    button.clotheForm_btn.btn.btn-primary:hover {
        background-color: transparent;
        color: #4B49AC !important;
        transition: 0.4s;
    }

    .dynamic-nav .collasped {
        border-radius: 8px !important;
        margin-top: 3px !important;
        background-color: #4B49AC !important;

    }

    .dynamic-nav a {
        color: white !important;

    }

    a.nav-link.dynamic-link.btn.collapsed {
        border-radius: 8px !important;
        margin-top: 3px !important;
        background-color: transparent !important;
    }



    a.nav-link.dynamic-link.btn {
        border-radius: 8px !important;
        margin-top: 3px !important;
        background-color: #4B49AC !important;
    }

    .sidebar .accor_li,
    .sidebar .accor_li {
        background: transparent !important;
    }

    .sidebar .accor_li .card .dynamic-nav .nav-link i,
    .sidebar .accor_li .card .dynamic-nav .nav-link span {
        color: #6C7383 !important;
        font-weight: 500;
    }

    .sidebar .accor_li .card .dynamic-nav .nav-link:hover span {
        color: white !important;
    }

    .sidebar-icon-only .sidebar .accor_li a.dynamic-link {
        border-radius: 0 !important;
        padding: 16.2px 6px;
    }

    .sidebar .accor_li .card {
        background-color: transparent;
        border-radius: 0;
    }

    .sidebar .accor_li .card a,
    .sidebar .accor_li .card a i {
        color: #3e3e3e !important;
    }

    .sidebar .accor_li .card a.dynamic-link:hover {
        color: white !important;
    }

    .sidebar .accor_li .card:hover a.dynamic-link {
        background-color: #4B49AC !important;
    }

    .sidebar .accor_li .card a.dynamic-link:hover i {
        color: white !important;
    }

    .sidebar .accor_li .card a[aria-expanded="true"] .menu-title,
    .sidebar .accor_li .card a[aria-expanded="true"] .icon-grid {
        color: #ffffff !important;
    }

    .sidebar .accor_li .card .dynamic_sub_ul li.active a {
        background-color: #4b49ac;
    }

    .sidebar .accor_li .card .dynamic_sub_ul li a.dynamic_sub_a:hover {
        background-color: #4b49ac;
    }

    .sidebar .accor_li .card .dynamic_sub_ul li {
        margin: 0 0 6px;
    }

    .sidebar-icon-only .sidebar .accor_li .card-body {
        padding: 3px 0 0;
    }

    .sidebar .accor_li .card .dynamic_sub_ul li a.dynamic_sub_a:hover i {
        color: white !important;
    }

    .sidebar-icon-only .sidebar .accor_li .card-body a .menu-title {
        left: 0 !important;
    }

    .sidebar-icon-only .sidebar .accor_li .card-body a {
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
    }

    .sidebar .accor_li .card .dynamic_sub_ul li.active a {
        background-color: #3e3e3e;
    }

    .check_col {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .check_col .check_field {
        flex: 0 0 32.6%;
        max-width: 32.6%;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .check_col .check_field label {
        margin: 0;
        font-size: 14px !important;
        font-weight: 600;
    }

    .check_col .check_field input:focus {
        --tw-ring-offset-width: 0;
    }
</style>
