@extends('layouts.app-admin')
@section('title')
    {{ isset($team) ? 'Ubah Kelompok: ' : 'Tambah Kelompok' }}
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Bentuk Kelompok</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.team.index')}}">Kelompok</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="card">
        <form action="{{route('dashboard.team.store')}}" method="POST">
            @csrf
            @if (isset($team))
                <input type="hidden" name="id" value="{{ $team->id }}" autocomplete="off">
            @endif
            <div class="card-header">
                <div class="pt-6">
                    <h5 class="mb-0">Bentuk Kelompok</h5>
                    <p class="text-gray-500">Silakan isi setiap kolom dengan teliti dan informasi yang benar.</p>

                </div>
            </div>
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Nama Kelompok<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ? old('name') : (isset($team) ? $team->name : '') }}" placeholder="ex: Kelompok 1">
                        <div class="invalid-feedback">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Deskripsi <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"  rows="5" placeholder="">
                            {{ old('description') ? old('description') : (isset($team) ? $team->description : '') }}
                        </textarea>
                        <div class="invalid-feedback">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-1">
                    <label class="col-md-2 col-form-label">Pilih Pengguna <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <div class="form-group">
                            <select id="user_select" data-toggle="select" data-control="select2"
                                class="form-control @error('user_id') is-invalid @enderror" name="user_id[]" multiple>
                                @foreach ($users as $user)
                                    @if(!in_array($user->id, $usedUsers)) <!-- Hanya tampilkan user yang belum terdaftar di tim lain -->
                                        <option value="{{ $user->id }}"
                                            {{ in_array($user->id, $teamUserIds) ? 'selected' : '' }}> <!-- Tandai sebagai selected jika terdaftar di tim ini -->
                                            {{ $user->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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
