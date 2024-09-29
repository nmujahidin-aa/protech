@extends('layouts.app-admin')
@section('title')
    {{ isset($video) ? 'Ubah video: ' : 'Tambah video' }}
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Video</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.video.index')}}">Video</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="card">
        <form action="{{route('dashboard.video.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($video))
                <input type="hidden" name="id" value="{{ $video->id }}" autocomplete="off">
            @endif
            <div class="card-header">
                <div class="pt-6">
                    <h5 class="mb-0">video</h5>
                    <p class="text-gray-500">Harap lengkapi setiap kolom dengan cermat dan pastikan semua informasi yang dimasukkan benar.</p>

                </div>
            </div>
            <div class="card-body">

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Thumbnail <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" value="{{ old('thumbnail') ? old('thumbnail') : (isset($video) ? $video->thumbnail : '') }}">
                        <div class="invalid-feedback">
                            @error('thumbnail')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Judul <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') ? old('title') : (isset($video) ? $video->title : '') }}">
                        <div class="invalid-feedback">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">URL <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" value="{{ old('url') ? old('url') : (isset($video) ? $video->url : '') }}" placeholder="masukan link youtube">
                        <div class="invalid-feedback">
                            @error('url')
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
