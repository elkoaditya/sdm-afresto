@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')


    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/animate-css/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/chartist-js/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/chartist-js/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-modern.css">
@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/chartjs/chart.min.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>

    <script src="../../../app-assets/vendors/chartjs/chart.min.js"></script>
    <script src="../../../app-assets/vendors/chartist-js/chartist.min.js"></script>
    <script src="../../../app-assets/vendors/chartist-js/chartist-plugin-tooltip.js"></script>
    <script src="../../../app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../../../app-assets/js/plugins.js"></script>
    <script src="../../../app-assets/js/search.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script>
        setTimeout(function () {
            M.toast({ html: "Hey! I am a toast." })
        }, 2000)

        // Donut chart
        // -----------
        var CurrentBalanceDonutChart = new Chartist.Pie(
            "#current-balance-donut-chart",
            {
                labels: [1, 2],
                series: [
                    { meta: "Wajin", value: 1 },
                    { meta: "Tidak Wajib", value: 20 }
                ]
            },

            {
                donut: true,
                donutWidth: 8,
                showLabel: false,
                plugins: [
                    Chartist.plugins.tooltip({
                        class: "current-balance-tooltip",
                        appendToBody: true
                    }),
                    Chartist.plugins.fillDonut({
                        items: [
                            {
                                content:
                                    '<p class="small">Pengajar</p><h5 class="mt-0 mb-0">{{$totalUser}}</h5>'
                            }
                        ]
                    })
                ]
            }
        )
    </script>
@endsection


@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user()
    @endphp
    <div class="row">
        <div class="col s12 l4">
            <div id="profile-card" class="card animate fadeRight">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../../app-assets/images/gallery/3.png" alt="user bg" />
                </div>
                <div class="card-content">
                    <img src="../../../app-assets/images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2" />
                    <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                    </a>
                    <h5 class="card-title activator grey-text text-darken-4">{{$user->username}}</h5>
                    <p><i class="material-icons profile-card-i">perm_identity</i> {{$user->role}}</p>
                    <p><i class="material-icons profile-card-i">domain</i> {{$user->devisi}}</p>
                    <p><i class="material-icons profile-card-i">email</i> ...</p>
                </div>
                <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">{{$user->username}}<i class="material-icons right">close</i>
                                            </span>
                    <p>Here is some more information about this card.</p>
                    <p><i class="material-icons profile-card-i">perm_identity</i> {{$user->role}}</p>
                    <p><i class="material-icons profile-card-i">domain</i> {{$user->devisi}}</p>
                    <p><i class="material-icons profile-card-i">email</i> ...</p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col s12 l8">
            <div class="row vertical-modern-dashboard">
                <div class="col s12 m4 l4">
                    <!-- Current Balance -->
                    <div class="card animate fadeLeft">
                        <div class="card-content">
                            <h6 class="mb-0 mt-0 display-flex justify-content-between">Current Balance <i class="material-icons float-right">more_vert</i>
                            </h6>
                            <p class="medium-small">Wajib / Tidak Wajib</p>
                            <div class="current-balance-container">
                                <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                            </div>
                            <p class="medium-small center-align mt-4">Diagram Sertifikasi guru</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m8 l8 animate fadeRight">
                    <div class="card subscriber-list-card animate fadeRight">
                        <div class="card-content pb-1">
                            <h4 class="card-title mb-0">Trafik today<i class="material-icons float-right">more_vert</i></h4>
                        </div>
                        <table class="subscription-table responsive-table highlight">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Datang</th>
                                <th>Tgl Masuk</th>
                                <th>Status</th>
                                <th>Stok sekarang</th>
                            </tr>
                            </thead>
                            <tbody>
                                                @foreach($rec as $barang)
                                                    <tr>
                                                        <td>{{$barang->file}}</td>
                                                        <td>{{$barang->name}}</td>
                                                        <td>{{$barang->created_at}}</td>
                                                        <td><span class="badge green">In</span></td>
                                                        <td>{{$barang->updated_at}}</td>
                                                    </tr>
                                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l4">
            <div class="card padding-4 animate fadeLeft">
                <div class="row">
                    <div class="col s5 m5">
                        <h5 class="mb-0">{{$totalUser}}</h5>
                        <p class="no-margin">Total User</p>
                        <p class="mb-0 pt-8">{{APP_TITLE}}</p>
                    </div>
                    <div class="col s7 m7 right-align">
                        <i class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">list</i>
                        <p class="mb-0">Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
