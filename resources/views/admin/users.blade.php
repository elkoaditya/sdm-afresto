@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/horizontal-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/horizontal-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/layouts/style-horizontal.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-contacts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">

    <link rel="stylesheet" href="../../../app-assets/vendors/select2/select2.min.css" type="text/css">
    <link rel="stylesheet" href="../../../app-assets/vendors/select2/select2-materialize.css" type="text/css">
@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/js/plugins.js"></script>
    <script src="../../../app-assets/js/search.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <script src="../../../app-assets/js/scripts/app-contacts.js"></script>
    <script src="../../../app-assets/vendors/select2/select2.full.min.js"></script>
    <script src="../../../app-assets/js/scripts/form-select2.js"></script>
    <script type="text/javascript">
        function tokenacc() {
            // alert("Geted")
            document.getElementById("tokenkuu").value = "{{csrf_token()}}";
        }
    </script>
@endsection



@section('content')
    <div class="row">
        {{--        <div class="content-wrapper-before blue-grey lighten-5"></div>--}}
        <div class="contact-overlay"></div>
        <div class="col s12">
            <div class="container">
                <div class="sidebar-left sidebar-fixed">
                    <div class="sidebar">
                        <div class="sidebar-content">
                            <div class="sidebar-header">
                                <div class="sidebar-details">
                                    <h5 class="m-0 sidebar-title"><i class="material-icons app-header-icon text-top">perm_identity</i> List User
                                    </h5>
                                    <div class="mt-10 pt-2">
                                        <p class="m-0 subtitle font-weight-700">Total List User</p>
                                        <p class="m-0 text-muted">1457 List User</p>
                                    </div>
                                </div>
                            </div>
                            <div id="sidebar-list" class="sidebar-menu list-group position-relative animate fadeLeft delay-1">
                                <div class="sidebar-list-padding app-sidebar sidenav" id="contact-sidenav">
                                    <ul class="contact-list display-grid">
                                        <li class="sidebar-title">Filters</li>
                                        <li class="active"><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2">
                                                    perm_identity </i> All
                                                Contact</a></li>
                                        <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> history </i> Today</a>
                                        </li>
                                        <li class="sidebar-title">Devisi</li>
                                        <li><a href="javascript:void(0)" class="text-sub"><i class="purple-text material-icons small-icons mr-2">
                                                    fiber_manual_record </i> Engineering</a></li>
                                        <li><a href="javascript:void(0)" class="text-sub"><i class="amber-text material-icons small-icons mr-2">
                                                    fiber_manual_record </i> Sales</a></li>
                                        <li><a href="javascript:void(0)" class="text-sub"><i class="light-green-text material-icons small-icons mr-2">
                                                    fiber_manual_record </i> Support</a></li>
                                    </ul>
                                </div>
                            </div>
                            <a href="#" data-target="contact-sidenav" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
                        </div>
                    </div>
                </div>
                <div class="content-area content-right">
                    <div class="app-wrapper">
                        <div class="datatable-search">
                            <i class="material-icons mr-2 search-icon">search</i>
                            <input type="text" placeholder="Search Contact" class="app-filter" id="global_filter">
                        </div>
                        <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
                            <div class="card-content p-0">
                                <table id="data-table-contact" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="background-image-none center-align">
                                            <label>
                                                <input type="checkbox" onClick="toggle(this)" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th>Image</th>
                                        <th>Nama Barang</th>
                                        <th>Amount</th>
                                        <th>Devisi</th>
                                        <th>Favorite</th>
                                        <th>Fiture</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="center-align contact-checkbox">
                                                <label class="checkbox-label">
                                                    <input type="checkbox" name="foo" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/box.png" alt="avatar"></span></td>
                                            <td><a href="/admin/users/detail/{{$user->id}}">{{$user->nama}}</a></td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->alias}}</td>
                                            <td><span class="favorite"><i class="material-icons green-text"> star_border </i></span></td>
                                            <td>
                                                <a href="/admin/users/detail/{{$user->id}}" ><i class="material-icons green-text mr-10">search</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
