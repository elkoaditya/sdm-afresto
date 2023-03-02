@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

@endsection
{{--untuk JS--}}
@section('js')

@endsection


@section('content')
    <div class="row">
        <div class="col s12">
            <ul class="collapsible collapsible-accordion">
                @foreach($sertifikasis as $sertifikasi)

                    @php
                        $t = \App\Models\Sertifikasi::with(['user' => function($q) use ($id, $sertifikasi){
    $q->where('id_user', '=', $id);
    $q->where('id_sertifikasi', '=', $sertifikasi->id);
}])->whereHas('user', function ($q) use ($id, $sertifikasi){
    $q->where('id_user', '=', $id);
    $q->where('id_sertifikasi', '=', $sertifikasi->id);
})
->first();
                    @endphp
                    <li>
                        <div class="collapsible-header <?php
                        if (!$t){
                            echo 'red-text';
                        }else{
                            echo 'green-text';
                        }
                        ?>"><i class="material-icons">folder</i> {{$sertifikasi->name}}</div>
                        <div class="collapsible-body">
                            @if(!$t)

                            @else
                                <div class="row">
                                    <div class="col s12 m4">
                                        <h6 class="mb-2"><i class="material-icons">link</i> Social Links</h6>
                                        <table class="striped">
                                            <tbody>
                                            <tr>
                                                <td>Nomor Sertifikasi</td>
                                                <td>{{$t->user->nomor}}</td>
                                            </tr>
                                            <tr>
                                                <td>Start Date</td>
                                                <td class="users-view-latest-activity">{{$t->user->start_date}}</td>

                                            </tr>
                                            <tr>
                                                <td>End Date</td>
                                                <td class="users-view-verified">{{$t->user->end_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Role:</td>
                                                <td class="users-view-role">{{$t->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td><span class=" users-view-status chip green lighten-5 green-text">Active</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col s12 m8">
                                        <h6 class="mb-2"><i class="material-icons">link</i> Document Includes</h6>
                                        <table class="striped">
                                            <tbody>
                                                @foreach($t->user->doc as $doc)
                                                    <tr>
                                                        <td><a href="https://docs.google.com/gview?url={{\Illuminate\Support\Facades\URL::to('/').$doc->file}}&embedded=true">{{$doc->name}}</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
