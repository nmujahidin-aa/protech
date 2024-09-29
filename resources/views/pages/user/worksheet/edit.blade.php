@extends('layouts.app')
@section('title', 'Penugasan | PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;">
                        <h1 class="custom-font px-10">
                            @if ($team)
                                {{$team->name}}
                            @else
                                Belum ada kelompok
                            @endif
                        </h1>
                    </div>
                </div>

                <div class="row gy-5 py-8">
                    {{-- <a href="" class="col-md-6 col-sm-12">
                        <div class="card background" style="background-color: #9945d6;">
                            <div class="card-body text-center">
                                <i class="ki-duotone ki-cloud-download text-light" style="font-size: 100px;">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                </i>
                                <h5 class="text-center pt-5 text-light recoleta fs-1">Unggah Hasil Karya</h5>
                            </div>
                        </div>
                    </a>
                    <a href="{{route("assignment.explore")}}" class="col-md-6 col-sm-12">
                        <div class="card background" style="background-color: #9945d6;">
                            <div class="card-body text-center">
                                <i class="ki-duotone ki-parcel-tracking text-light" style="font-size: 100px;">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                </i>
                                <h5 class="text-center pt-5 text-light recoleta fs-1">Eksplor Hasil Karya</h5>
                            </div>
                        </div>
                    </a> --}}
                    @if ($team)
                        Team: {{$team->name}}
                        <br>
                        Anggota:
                        <ul>
                            @foreach ($members as $member)
                                <li>User ID: {{$member}}</li>
                            @endforeach
                        </ul>
                    @else
                        Belum ada kelompok
                    @endif
                </div>

                <div class="d-flex justify-content-center" style="position: absolute; bottom: -25px; right: 10px;">
                    <a href="{{route('home.index')}}" class="circlebutton">
                        <i class="ki-solid ki-home fs-1 text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
