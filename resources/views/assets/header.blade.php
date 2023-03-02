<?php
    $sidebar = \Illuminate\Support\Facades\DB::table('menus')
        ->where('role', \Illuminate\Support\Facades\Auth::user()->role)
        ->get();

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SDM | {{APP_TITLE}} | @yield('header')</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/horizontal-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/horizontal-menu-template/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/layouts/style-horizontal.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">
    @yield('css')
</head>
<body class="horizontal-layout page-header-light horizontal-menu preload-transitions 2-columns   " data-open="click" data-menu="horizontal-menu" data-col="2-columns">
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-light-blue-cyan">
            <div class="nav-wrapper">
                <ul class="left">
                    <li>
{{--                        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="#"><img src="../../../app-assets/images/unaki.png" alt="materialize logo" width="70px"></a></h1>--}}
                        SDM {{APP_TITLE}}
                    </li>
                </ul>
                <ul class="navbar-list right">
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                    <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search </i></a></li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>
                </ul>
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                    <form action="/logout" method="post" name="logout">
                        @csrf
                        <li><a class="grey-text text-darken-1" onclick="fn_submit()"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                    </form>
                </ul>
            </div>
        </nav>
        <nav class="white hide-on-med-and-down" id="horizontal-nav">
            <div class="nav-wrapper">
                <ul class="left hide-on-med-and-down" id="ul-horizontal-nav" data-menu="menu-navigation">
                    @foreach($sidebar as $side)
                        <li class="bold"><a class="waves-effect waves-cyan " href="{{$side->tujuan}}" ><i class="material-icons">{{$side->icon}}</i><span class="menu-title" data-i18n="Support">{{$side->name}}</span></a></li></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</header>
<ul class="display-none" id="page-search-title">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">PAGES</h6>
        </a></li>
</ul>
<ul class="display-none" id="search-not-found">
    <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
</ul>
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-fixed hide-on-large-only">
    <div class="brand-sidebar sidenav-light"></div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed hide-on-large-only menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        @foreach($sidebar as $side)
            <li class="bold"><a class="waves-effect waves-cyan " href="{{$side->tujuan}}" ><i class="material-icons">{{$side->icon}}</i><span class="menu-title" data-i18n="Support">{{$side->name}}</span></a></li></li>
        @endforeach
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<div id="main">
    <div class="row">

        <div class="col s12">
            <div class="container">
                <div class="section">
                    @yield('content')
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<footer class="page-footer footer footer-static footer-dark gradient-45deg-light-blue-cyan gradient-shadow navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span>&copy; 2021 <a href="#">Admin</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="#">Admin</a></span></div>
    </div>
</footer>
<script>
    function fn_submit()
    {
        document.logout.submit();
    }
</script>
<script src="../../../app-assets/js/vendors.min.js"></script>
<script src="../../../app-assets/js/plugins.js"></script>
<script src="../../../app-assets/js/search.js"></script>
<script src="../../../app-assets/js/custom/custom-script.js"></script>
@yield('js')
</body>

</html>
