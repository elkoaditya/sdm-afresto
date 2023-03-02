@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice.css">
@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/form_repeater/jquery.repeater.min.js"></script>
    <script src="../../../app-assets/js/scripts/app-invoice.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'mm/dd/yy'
            });
        });
    </script>
@endsection


@section('content')
    <section class="invoice-edit-wrapper section">
        <div class="row">
            <!-- invoice view page -->
            <form action="/sdm/sertifikasi/save" method="post" enctype="multipart/form-data">@csrf
                <div class="col xl9 m8 s12">
                    <div class="card">
                        <div class="card-content px-36">
                            <!-- header section -->
                            <div class="row mb-3">
                                <div class="col xl4 m12 display-flex align-items-center">
                                    <h6 class="invoice-number mr-4 mb-5">Kategori</h6>
                                    <input type="text" value="{{$kategori->name}}" disabled>
                                </div>
                                <div class="col xl8 m12">
                                    <div class="invoice-date-picker display-flex align-items-center">
                                        <div class="display-flex align-items-center">
                                            <small>Date create: </small>
                                            <div class="display-flex ml-4">
                                                <input type="text" class="datepicker mr-2 mb-1" value="{{$kategori->created_at}}" disabled>
                                            </div>
                                        </div>
                                        <div class="display-flex align-items-center">
                                            <small>Date Update: </small>
                                            <div class="display-flex ml-4">
                                                <input type="text" class="datepicker mb-1" value="{{$kategori->created_at}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- logo and title -->
                            <input value="{{$kategori->id}}" name="id_kategori" type="hidden">

                            <div class="row mb-3">
                                <div class="col m6 s12 invoice-logo display-flex pt-1 push-m6">
                                </div>
                                <div class="col m6 s12 pull-m6">
                                    <h4 class="indigo-text">Detail Sertifikasi</h4>
                                </div>
                            </div>
                            <!-- invoice address and contact -->
                            <div class="row mb-3">
                                <div class="col l6 s12">
                                    @if($userSertifikat)
                                        <div class="input-field">
                                            <div class="input-field col s12">
                                                <input id="password" type="text" class="validate" name="nomor" value="{{$userSertifikat->nomor}}">
                                                <label for="password">Nomor Sertifikasi</label>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <div class="input-field">
                                                <div class="input-field col s12">
                                                    <input type="text" class="datepicker" name="start_date" value="{{\Carbon\Carbon::parse($userSertifikat->start_date)->format('m/d/y')}}">
                                                    <label for="password">Berlaku Sertifikasi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <div class="input-field">
                                                <div class="input-field col s12">
                                                    <input type="text" class="datepicker" name="end_date" value="{{\Carbon\Carbon::parse($userSertifikat->end_date)->format('m/d/y')}}">
                                                    <label for="password">Akhir Sertifikasi</label>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-field">
                                            <div class="input-field col s12">
                                                <input id="password" type="text" class="validate" name="nomor">
                                                <label for="password">Nomor Sertifikasi</label>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <div class="input-field">
                                                <div class="input-field col s12">
                                                    <input type="text" class="datepicker" name="start_date">
                                                    <label for="password">Berlaku Sertifikasi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <div class="input-field">
                                                <div class="input-field col s12">
                                                    <input type="text" class="datepicker" name="end_date">
                                                    <label for="password">Akhir Sertifikasi</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- product details table-->
                            <h5 class="pt-3 pb-1">Upload Sertifikasi</h5>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" multiple name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- invoice action  -->
                <div class="col xl3 m4 s12">
                    <div class="card invoice-action-wrapper mb-10">
                        <div class="card-content">
                            <div class="invoice-action-btn">
                                <a class="btn indigo waves-effect waves-light display-flex align-items-center justify-content-center" onclick="$(this).closest('form').submit()">
                                    <i class="material-icons mr-4">check</i>
                                    <span class="responsive-text">Save Sertifikat</span>
                                </a>
                            </div>
                            <div class="invoice-action-btn">
                                <a class="btn btn-light-indigo btn-block waves-effect waves-light">
                                    <span class="responsive-text">Download Sertifikat</span>
                                </a>
                            </div>
                            <div class="row invoice-action-btn">
                                <div class="col s6 preview">
                                    <a class="btn btn-light-indigo btn-block waves-effect waves-light disabled">
                                        <span class="responsive-text">Preview</span>
                                    </a>
                                </div>
                                <div class="col s6 save">
                                    <a class="btn btn-light-indigo btn-block waves-effect waves-light disabled">
                                        <span class="responsive-text">Public Link</span>
                                    </a>
                                </div>
                            </div>
                            <div class="invoice-action-btn">
                                <a class="btn waves-effect waves-light display-flex align-items-center justify-content-center disabled">
                                    <i class="material-icons mr-3">attach_money</i>
                                    <span class="responsive-text">Add Payment</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-payment mb-3">
                        <div class="invoice-payment-option mb-3">
                            <p class="mb-0 mt-3">Accept payments via</p>
                            <select name="payment" id="paymentOption">
                                <option value="DebitCard">Debit Card</option>
                                <option value="DebitCard">Credit Card</option>
                                <option value="DebitCard">Paypal</option>
                                <option value="DebitCard">Internet Banking</option>
                                <option value="DebitCard">UPI Transfer</option>
                            </select>
                        </div>
                        <div class="invoice-terms display-flex flex-column">
                            <div class="display-flex justify-content-between pb-2">
                                <span>Payment Terms</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="display-flex justify-content-between pb-2">
                                <span>Client Notes</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" checked>
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="display-flex justify-content-between pb-2">
                                <span>Payment Stub</span>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
