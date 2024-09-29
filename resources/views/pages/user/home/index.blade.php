@extends('layouts.app')
@section('title', 'Home | PROTECH')
@section('content')
<div class="d-flex justify-content-center">
    <div style="width: 75%;" class="pb-10">
        <h1 class="text-light text-center py-3 custom-font">Menu Utama</h1>
        <!-- Row 1 -->
        <div class="row g-7">
            <div class="col-lg-4 col-sm-12 col-md-6 text-center">
                <a href="{{route('introduction.index')}}" class="card background">
                    <div class="card-body">
                        <img src="assets/image/icon/1.png" alt="pendahuluan" style="width: 30%;">
                        <h4 class="text-light pt-1">Pendahuluan</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-6 text-center">
                <a href="{{route("material.index")}}" class="card background">
                    <div class="card-body">
                        <img src="assets/image/icon/2.png" alt="pendahuluan" style="width: 30%;">
                        <h4 class="text-light pt-1">Materi</h4>
                    </div>
                </a>
            </div>
            <a href="{{route('video.index')}}" class="col-lg-4 col-sm-12 col-md-6 text-center">
                <div class="card background">
                    <div class="card-body">
                        <img src="assets/image/icon/3.png" alt="pendahuluan" style="width: 30%;">
                        <h4 class="text-light pt-1">Video</h4>
                    </div>
                </div>
            </a>
        </div>

        <!-- Row 2 -->
        <div class="row g-7 mt-3">
            <div class="col-lg-4 col-sm-12 col-md-6 text-center">
                <a href="{{route('worksheet.index')}}" class="card background">
                    <div class="card-body">
                        <img src="assets/image/icon/4.png" alt="pendahuluan">
                        <h4 class="text-light pt-1">E-LKPD</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-6 text-center">
                <a href="{{route("assignment.index")}}" class="card background">
                    <div class="card-body">
                        <img src="assets/image/icon/5.png" alt="pendahuluan">
                        <h4 class="text-light pt-1">Penugasan</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-6 text-center">
                <a href="{{route("evaluation.index")}}" class="card background">
                    <div class="card-body">
                        <img src="assets/image/icon/6.png" alt="pendahuluan">
                        <h4 class="text-light pt-1">Evaluasi</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
