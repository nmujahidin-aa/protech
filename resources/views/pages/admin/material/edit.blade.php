@extends('layouts.app-admin')
@section('title')
    {{ isset($material) ? 'Ubah Materi: ' : 'Tambah Materi' }}
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Materi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.material.index')}}">Materi</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="card">
        <form action="{{route('dashboard.material.store')}}" method="POST">
            @csrf
            @if (isset($material))
                <input type="hidden" name="id" value="{{ $material->id }}" autocomplete="off">
            @endif
            <div class="card-header">
                <div class="pt-6">
                    <h5 class="mb-0">Materi</h5>
                    <p class="text-gray-500">Silakan isi setiap kolom dengan teliti dan informasi yang benar.</p>

                </div>
            </div>
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Judul <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') ? old('title') : (isset($material) ? $material->title : '') }}">
                        <div class="invalid-feedback">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Pertanyaan <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" value="{{ old('question') ? old('question') : (isset($material) ? $material->question : '') }}">
                        <div class="invalid-feedback">
                            @error('question')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Wawasan <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="insight" class="form-control @error('insight') is-invalid @enderror" id="insight" value="{{ old('insight') ? old('insight') : (isset($material) ? $material->insight : '') }}">
                        <div class="invalid-feedback">
                            @error('insight')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Konten <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="5" placeholder="">
                            {{ old('content') ? old('content') : (isset($material) ? $material->content : '') }}
                        </textarea>
                        <div class="invalid-feedback">
                            @error('content')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Ringkasan <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" id="summary" rows="5" placeholder="">
                            {{ old('summary') ? old('summary') : (isset($material) ? $material->summary : '') }}
                        </textarea>
                        <div class="invalid-feedback">
                            @error('summary')
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

@section('scripts')
<script>
    document.querySelectorAll('#content, #summary').forEach(element => {
        ClassicEditor
            .create(element, {
                ckfinder: {
                    uploadUrl: "{{ route('dashboard.introduction.upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
