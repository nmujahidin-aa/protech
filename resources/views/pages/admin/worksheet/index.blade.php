@extends('layouts.app-admin')
@section('title', 'E-LKPD | PROTECH LEARNING')

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">E-LKPD</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Worksheet</li>
                    </ol>
                </nav>
            </div>

            <div class="col-auto">
                @if ($worksheet->isEmpty())
                    <a class="btn btn-primary" href="{{ route('dashboard.worksheet.edit') }}">
                        <i class="ki-solid ki-pencil fs-3"></i> Tambah
                    </a>
                @endif
                @if ($worksheet->isNotEmpty())
                    <a class="btn btn-primary" href="{{ route('dashboard.worksheet.edit', $worksheet->first()->id) }}">
                        <i class="ki-solid ki-pencil fs-3"></i> Edit
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>

    <div class="card card-p-2 card-flush">
        <div class="card-body">
            @if ($worksheet->isNotEmpty() && $worksheet->first()->file)
                <embed class="pt-5 rounded" src="{{ asset('storage/' . $worksheet->first()->file) }}" width="100%" height="600px" type="application/pdf">
            @else
                <p class="text-danger text-center">-- LKPD Belum ditambahkan --</p>
            @endif
        </div>
    </div>
</div>
@endsection
