@extends('layouts.app-admin')
@section('title')
    {{ isset($user) ? 'Ubah User: ' : 'Tambah User' }}
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">User</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.user.index')}}">User</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="card">
        <form action="{{route('dashboard.user.store')}}" method="POST">
            @csrf
            @if (isset($user))
                <input type="hidden" name="id" value="{{ $user->id }}" autocomplete="off">
            @endif
            <div class="card-header">
                <div class="pt-6">
                    <h5 class="mb-0">User</h5>
                    <p class="text-gray-500">Harap lengkapi setiap kolom dengan cermat dan pastikan semua informasi yang dimasukkan benar. <br> Mohon diperhatikan bahwa tidak ada fitur pemulihan password, jadi pastikan Anda mengingat password dengan baik.</p>

                </div>
            </div>
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Nama <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ? old('name') : (isset($user) ? $user->name : '') }}">
                        <div class="invalid-feedback">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Email <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') ? old('email') : (isset($user) ? $user->email : '') }}">
                        <div class="invalid-feedback">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-md-2 col-form-label">Password <span class="text-gray-600"><i>(opsional)</i></span></label>
                    <div class="col-md-10">
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="kosongkan jika tidak perlu">
                        <div class="invalid-feedback">
                            @error('password')
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
