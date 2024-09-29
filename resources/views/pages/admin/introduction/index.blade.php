@extends('layouts.app-admin')
@section('title', 'Dashboard | PROTECH LEARNING')

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Pendahuluan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Pandhuluan</li>
                    </ol>
                </nav>
            </div>

            <div class="col-auto">
                @if ($introduction->isEmpty())
                    <a class="btn btn-primary" href="{{ route('dashboard.introduction.edit')}}">
                        <i class="ki-solid ki-pencil fs-3"></i> Buat
                    </a>
                @endif
                @if ($introduction->isNotEmpty())
                    <a class="btn btn-primary" href="{{ route('dashboard.introduction.edit', $introduction->first()->id) }}">
                        <i class="ki-solid ki-pencil fs-3"></i> Edit
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>

    <div class="card card-p-2 card-flush">
        <div class="card-body">
            <span class="fw-bold fs-3">Tujuan Pembelajaran</span><br>
            @if ($introduction->isNotEmpty() && $introduction->first()->purpose)
                {!! $introduction->first()->purpose !!}
            @else
                <p class="text-danger">-- Tujuan Pembelajaran belum dibuat --</p>
            @endif
            <div class="separator my-5"></div>

            <span class="fw-bold fs-3">Panduan Penggunaan Media</span><br>
            @if ($introduction->isNotEmpty() && $introduction->first()->guide)
                {!! $introduction->first()->guide !!}
            @else
                <p class="text-danger">-- Panduan Penggunaan Media belum dibuat --</p>
            @endif
            <div class="separator my-5"></div>

            <span class="fw-bold fs-3">Tahapan Kegiatan Pembelajaran</span><br>
            @if ($introduction->isNotEmpty() && $introduction->first()->stage)
                {!! $introduction->first()->stage !!}
            @else
                <p class="text-danger">-- Tahapan Kegiatan Pembelajaran belum dibuat --</p>
            @endif
        </div>
    </div>
</div>
@endsection
