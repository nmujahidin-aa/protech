@extends('layouts.app')
@section('title', 'PROTECH')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div class="text-center">
        <img src="assets/image/logo/text.png" style="width: 75%;" alt="PROTECH">
        <h1 class="text-light recoleta">(Protists Electronic Charta)</h1>
        <a href="{{route('home.index')}}" class="button d-inline-flex align-items-center justify-content-center text-light" style="text-decoration: none;">
            <i class="ki-solid ki-right-square fs-3 me-2 text-light"></i> Let's Study
        </a>
    </div>
</div>
@endsection
