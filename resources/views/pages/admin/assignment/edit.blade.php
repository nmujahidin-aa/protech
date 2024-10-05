@extends('layouts.app-admin')
@section('title', 'Lihat Penugasan | PROTECH')

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Penugasan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.assignment.index')}}">Penugasan</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Lihat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>
    <div class="row">
        <div class="col-6">
            <img src="{{ asset('storage/' . $result->image) }}" style="width: 100%;" alt="poster {{$result->team->name }}}}">
        </div>
        <div class="col-6">
            <div class="bg-primary rounded pt-2 pb-1 text-center  text-light">
                <h3 class="text-light">{{ $result->team->name }}</h3>
                <p style="margin-top: -5px;">{{ $result->description }}</p>
            </div>
            <div class="card px-2 pt-5 mt-5" style="background-color: rgba(0, 0, 0, 0.0); border: 2px solid #cccccc; height: 80%;">
                <div class="card-body" style="max-height: 100vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
