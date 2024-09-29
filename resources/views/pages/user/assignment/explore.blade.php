@extends('layouts.app')
@section('title', 'Penugasan | PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;"><h1 class="custom-font px-10">Penugasan</h1></div>
                </div>

                <div class="row gy-5 py-8">
                    <a href="" class="col-md-6 col-sm-12">
                        <div class="card background" style="background-color: #9945d6;">
                            <div class="card-body text-center">
                                <p class="recoleta text-warning">Kelompok 1</p>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="" alt="">
                                    </div>
                                    <div class="col-8">
                                        <p class="text-light text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus possimus dolor fuga provident eius natus quae sunt modi, harum deserunt. Autem, ab? Eaque quo provident est dolorum, quae illum. Quas?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="col-md-6 col-sm-12">
                        <div class="card background" style="background-color: #9945d6;">
                            <div class="card-body text-center">
                                <p class="recoleta text-warning">Kelompok 1</p>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="" alt="">
                                    </div>
                                    <div class="col-8">
                                        <p class="text-light">Deskripsi singkat nya pokok ini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="d-flex justify-content-center" style="position: absolute; bottom: -25px; right: 10px;">
                    <a href="{{route('assignment.index')}}" class="circlebutton">
                        <i class="ki-solid ki-arrow-left fs-1 text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

