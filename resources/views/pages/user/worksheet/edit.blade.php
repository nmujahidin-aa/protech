@extends('layouts.app')
@section('title', 'Penugasan | PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;">
                        <h1 class="custom-font px-10">
                            @if ($team)
                                {{$team->name}}
                            @else
                                Belum ada kelompok
                            @endif
                        </h1>
                    </div>
                </div>

                <div class="row gy-5 py-8">
                    @if ($team)
                        <div class="d-flex align-items-center">
                            <h5 class="text-light recoleta me-2 mb-0">Anggota Kelompok:</h5>
                            @foreach ($team->members as $member)
                                <div class="symbol symbol-35px symbol-circle d-inline-block me-2" data-bs-toggle="tooltip" title="{{ $member->name }}">
                                    <span class="symbol-label bg-{{ $member->getRandomColor() }} text-inverse-{{ $member->getRandomColor() }} fw-bold">
                                        {{ substr($member->name, 0, 1) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{ route('worksheet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="team_id" value="{{$id}}">
                            <div class="form-group row mb-3">
                                <label class="col-md-2 col-form-label text-light recoleta">
                                    @if ($existingWorksheet)
                                        Ubah E-LKPD
                                    @else
                                        Tambah E-LKPD
                                    @endif
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file" value="{{ old('file') ? old('file') : (isset($material) ? $material->file : '') }}">
                                    <div class="invalid-feedback">
                                        @error('file')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div>
                                        @if ($existingWorksheet)
                                            <a href="{{ asset('storage/' . $existingWorksheet->file) }}" target="_blank" class="text-light recoleta">Lihat E-LKPD kelompok</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-5">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    @else
                        <p class="text-center text-light recoleta">-- Belum ada kelompok --</p>
                    @endif
                </div>

                <div class="d-flex justify-content-center" style="position: absolute; bottom: -25px; right: 10px;">
                    <a href="{{route('worksheet.index')}}" class="circlebutton">
                        <i class="ki-solid ki-left fs-1 text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection
