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
                    { meta: "Wajin", value: {{$jawab_wajib->count()}} },
                    { meta: "Tidak Wajib", value: {{$all_wajib->count()  - $jawab_wajib->count()}} }
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
                                    '<p class="small">Pengajar</p><h5 class="mt-0 mb-0">{{$jawab_wajib->count()}} / {{$all_wajib->count()}}</h5>'
                            }
                        ]
                    })
                ]
            }
        )
        var CurrentBalanceDonutChart = new Chartist.Pie(
            "#current-balance-donut-chart1",
            {
                labels: [1, 2],
                series: [
                    { meta: "Wajin", value: {{$jawab_tidakwajib->count()}} },
                    { meta: "Tidak Wajib", value: {{$all_tidakwajib->count() - $jawab_tidakwajib->count()}} }
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
                                    '<p class="small">Pengajar</p><h5 class="mt-0 mb-0">{{$jawab_tidakwajib->count()}} / {{$all_tidakwajib->count()}}</h5>'
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
        <div class="col s12 l12">
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
    </div>
    <div class="row">
        <div class="col s12 m6 l6">
            <!-- Current Balance -->
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <h6 class="mb-0 mt-0 display-flex justify-content-between">Sertifikasi Wajin
                    </h6>
                    <p class="medium-small">Wajib / Tidak Wajib</p>
                    <div class="current-balance-container">
                        <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                    </div>
                    <p class="medium-small center-align mt-4">Diagram Sertifikasi guru</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6 m6">
            <!-- Current Balance -->
            <div class="card animate fadeLeft">
                <div class="card-content">
                    <h6 class="mb-0 mt-0 display-flex justify-content-between">Sertifikasi Tidak Wajib
                    </h6>
                    <p class="medium-small">Wajib / Tidak Wajib</p>
                    <div class="current-balance-container">
                        <div id="current-balance-donut-chart1" class="current-balance-shadow"></div>
                    </div>
                    <p class="medium-small center-align mt-4">Diagram Sertifikasi guru</p>
                </div>
            </div>
        </div>
    </div>
@endsection
