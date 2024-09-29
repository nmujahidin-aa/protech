@extends('layouts.app-admin')
@section('title')
    {{ isset($introduction) ? 'Ubah Pendahuluan: ' : 'Tambah Pendahuluan' }}
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Pnedahuluan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.introduction.index')}}">Pendahuluan</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="card">
        <form action="{{route('dashboard.introduction.store')}}" method="POST">
            @csrf
            @if (isset($introduction))
                <input type="hidden" name="id" value="{{ $introduction->id }}" autocomplete="off">
            @endif
            <div class="card-header">
                <div class="pt-6">
                    <h5 class="mb-0">Pendahuluan</h5>
                    <p class="text-gray-500">Silakan isi setiap kolom dengan teliti dan informasi yang benar.</p>

                </div>
            </div>
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="col-md-12 col-form-label fw-bold">Tujuan Pembelajaran <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror" id="purpose" rows="5" placeholder="">
                            {{ old('purpose') ? old('purpose') : (isset($introduction) ? $introduction->purpose : '') }}
                        </textarea>
                        <div class="invalid-feedback">
                            @error('purpose')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-12 col-form-label fw-bold">Panduan Penggunaan Media <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <textarea name="guide" class="form-control @error('guide') is-invalid @enderror" id="guide" rows="5" placeholder="">
                            {{ old('guide') ? old('guide') : (isset($introduction) ? $introduction->guide : '') }}
                        </textarea>
                        <div class="invalid-feedback">
                            @error('guide')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-12 col-form-label fw-bold">Tahapan Kegiatan Pembelajaran <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <textarea name="stage" class="form-control @error('stage') is-invalid @enderror" id="stage" rows="5" placeholder="">
                            {{ old('stage') ? old('stage') : (isset($introduction) ? $introduction->stage : '') }}
                        </textarea>
                        <div class="invalid-feedback">
                            @error('stage')
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
    document.querySelectorAll('#purpose, #guide, #stage').forEach(element => {
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
