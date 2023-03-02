@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/dataTables.checkboxes.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/horizontal-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/horizontal-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/layouts/style-horizontal.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice.css">
@endsection
{{--untuk JS--}}
@section('js')

    <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/data-tables/js/datatables.checkboxes.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../../../app-assets/js/plugins.js"></script>
    <script src="../../../app-assets/js/search.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/app-invoice.js"></script>

    <script src="../../../app-assets/js/scripts/advance-ui-modals.js"></script>
@endsection


@section('content')
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <div class="responsive-table">
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                <tr>
                                    <!-- data table responsive icons -->
                                    <th></th>
                                    <!-- data table checkbox -->
                                    <th></th>
                                    <th>
                                        <span>Kategori</span>
                                    </th>
                                    <th>Tipe</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sertifikasis as $sertifikasi)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="/sdm/sertifikasi/detail/{{$sertifikasi->id}}">{{$sertifikasi->name}}</a>
                                        </td>
                                        <td><span class="invoice-amount">{{$sertifikasi->type}}</span></td>
                                        <td><small>{{$sertifikasi->created_at}}</small></td>
                                        <td><small>{{$sertifikasi->updated_at}}</small></td>
                                        <td>
                                            <span class="bullet green"></span>
                                            <small>Sertifikasi</small>
                                        </td>
                                        <td>
                                            <span class="chip green-text">Active</span>
                                        </td>
                                        <td>
                                            <div class="invoice-action">
                                                <a href="app-invoice-view.html" class="invoice-action-view mr-4 green-text">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <form method="post" action="/admin/kategori/create" >@csrf
        <div id="modal2" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Create Kategori</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="text" class="validate" name="name">
                        <label for="password">Nama Sertifikasi</label>
                    </div>
                </div>
                <div class="input-field">
                    <select class="select2 browser-default" name="type">
                        <option value="wajib">Wajib</option>
                        <option value="tidakwajib">Tidak Wajib</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Disagree</a>
                <input type="submit" value="Save" class="modal-action modal-close waves-effect waves-green btn-flat ">
            </div>
        </div>
    </form>

@endsection
