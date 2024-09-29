@extends('layouts.app-admin')
@section('title')
    {{ isset($worksheet) ? 'Ubah LKPD: ' : 'Tambah LKPD' }}
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-file">E-LKPD</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.worksheet.index')}}">Worksheet</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">{{ isset($worksheet) ? 'Ubah: ' : 'Tambah' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="card">
        <form action="{{route('dashboard.worksheet.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($worksheet))
                <input type="hidden" name="id" value="{{ $worksheet->id }}" autocomplete="off">
            @endif
            <div class="card-header">
                <div class="pt-6">
                    <h5 class="mb-0">E-LKPD</h5>
                    <p class="text-gray-500">Silakan isi setiap kolom dengan teliti dan informasi yang benar.</p>

                </div>
            </div>
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">File <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file" value="{{ old('file') ? old('file') : (isset($worksheet) ? $worksheet->file : '') }}">
                        <div class="invalid-feedback">
                            @error('file')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary"> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
