@extends('layouts.app')
@section('title', 'Evaluasi | PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;"><h1 class="custom-font px-10">Evaluasi</h1></div>
                </div>

                <div class="row gy-2 mb-5">
                    <a href="{{route('introduction.learning-objectives')}}" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Pre-Test</h1>
                    </a>
                </div>

                <div class="row gy-2 mb-5">
                    <a href="{{route('introduction.guide')}}" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Latihan Soal</h1>
                    </a>
                </div>

                <div class="row gy-2 mb-5">
                    <a href="{{route('introduction.stage')}}" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Ayo Bermain</h1>
                    </a>
                </div>

                <div class="row gy-2 mb-5">
                    <a href="{{route('introduction.stage')}}" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Post-Test</h1>
                    </a>
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
