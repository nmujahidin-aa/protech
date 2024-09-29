@extends('layouts.app')
@section('title', 'Video Pembelajaran | PROTECH')
@section('style')
<style>
    img{
        max-width: 100%;
        height: auto;
    }
</style>
@endsection
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="btn btn-light" style="border: solid 3px #cccccc;"><h1 class="custom-font px-5">Video Pembelajaran</h1></div>
                </div>
                <div class="row gy-5 pt-5">
                    @if ($video->count() > 0)
                        @foreach ($video as $index => $row)
                        <a href="{{$row->url}}" target="_blank" class="col-md-6 col-sm-12">
                            <div class="card" style="background-color: #9945d6;">
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $row->thumbnail) }}" alt="thumbnail" class="rounded">
                                    <h5 class="text-center pt-5 text-light recoleta">{{$row->title}}</h5>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                      <div class="col-12">
                        <div class="text-center">
                            <h1 class="text-light recoleta">-- Belum ada Video yang ditambahkan --</h1>
                          </div>
                      </div>
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
