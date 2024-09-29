@extends('layouts.app')
@section('title', 'PROTECH')
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
        <div class="card" style="background-color: rgba(225, 225, 225, 0.9); border: 5px solid #cccccc; height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="bg rounded" style="background-color: #9945d6;">
                    <div class="py-3 px-3 text-light d-flex align-items-center">
                        <a href="{{ route('introduction.index') }}" class="btn btn-light me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <i class="ki-solid ki-left fs-2"></i>
                        </a>
                        <p class="fw-bold fs-2 mb-0">Tujuan Pembelajaran</p>
                    </div>
                </div>
                @if ($introduction)
                    <p class="text-light">{!! $introduction->purpose !!}</p>
                @else
                    <p class="text-center text-danger pt-10 recoleta">-- Tujuan Pembelajaran Belum Dibuat --</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
