@extends('layouts.app-admin')
@section('title', 'Soal Evaluasi | PROTECH')

@section('content')

<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Soal Evaluasi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Soal Evaluasi</li>
                    </ol>
                </nav>
            </div>

            <div class="col-auto">
                <a class="btn btn-primary" href="{{route('dashboard.team.edit')}}">
                    <i class="ki-solid ki-plus-square  fs-2"></i> Tambah
                </a>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
</div>
@endsection

@section('scripts')
@endsection
