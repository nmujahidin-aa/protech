@extends('layouts.app')
@section('title', 'E-LKPD | PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;"><h1 class="custom-font px-10">E-LKPD</h1></div>
                </div>

                <div class="row gy-2 gx-2 mb-5">
                    <a href="{{URL::to('/')}}/assets/lkpd/lkpd.pdf" target="_blank" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Overview E-LKPD</h1>
                    </a>
                </div>

                <div class="row gy-2 gx-2 mb-5">
                    <a href="{{URL::to('/')}}/assets/lkpd/lkpd.pdf" download="" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Unduh E-LKPD</h1>
                    </a>
                </div>

                <div class="row gy-2 gx-2 mb-5">
                    <a href="{{route('worksheet.edit', $id)}}" class="bg-purple py-5 rounded">
                        <h1 class="text-light text-center fs-1 recoleta">Pengumpulan E-LKPD</h1>
                    </a>
                </div>
                <input type="file" id="fileInput" style="display: none;">

                <div class="d-flex justify-content-center" style="position: absolute; bottom: -30px; width: 100%;">
                    <a href="{{route('home.index')}}" class="circlebutton">
                        <i class="ki-solid ki-home fs-1 text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
