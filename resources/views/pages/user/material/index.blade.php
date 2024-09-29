@extends('layouts.app')
@section('title', 'PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="btn btn-light" style="border: solid 3px #cccccc;"><h1 class="custom-font px-10">Materi</h1></div>
                </div>
                @if ($material->count() > 0)
                    @foreach ($material as $index => $row)
                    <div class="row gy-2 mb-5">
                        <a href="{{route('introduction.learning-objectives')}}" class="col-12 bg-purple py-5 px-10 rounded text-center">
                            <span class="text-light text-center fs-1 recoleta">{{$row->title}}</span>
                        </a>
                    </div>
                    @endforeach
                @else
                <div class="col-12">
                    <div class="text-center pt-10">
                        <h1 class="text-light recoleta">-- Belum ada Materi yang ditambahkan --</h1>
                      </div>
                  </div>
                @endif
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
