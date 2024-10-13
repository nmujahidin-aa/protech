@extends('layouts.app')
@section('title', 'Evaluasi | PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 80%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;"><h1 class="custom-font px-10">Pretest</h1></div>
                </div>

                <div class="row g-3 mb-5">
                    @foreach ( $material as $index => $row)
                    <div class="col-lg-6 col-sm-12 col-md-6 text-center">
                        <a href="" class="card background-test">
                            <div class="card-body">
                                <img src="{{URL::TO('/')}}/assets/image/icon/test.svg" alt="pendahuluan" style="width: 30%;">
                                <h4 class="text-light pt-1">{{$row->title}}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>




                <div class="d-flex justify-content-center" style="position: absolute; bottom: -25px; right: 10px;">
                    <a href="{{route('evaluation.index')}}" class="circlebutton">
                        <i class="ki-solid ki-left fs-1 text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
