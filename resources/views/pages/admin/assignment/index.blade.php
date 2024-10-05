@extends('layouts.app-admin')
@section('title', 'Penugasan | PROTECH')

@section('style')
<style>
    .custom-modal-size {
        width: 85vw;  /* 85% dari lebar viewport */
        height: 85vh; /* 85% dari tinggi viewport */
        max-width: 85vw; /* Membatasi lebar maksimum */
        max-height: 85vh; /* Membatasi tinggi maksimum */
    }
</style>
@endsection

@section('content')
<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Penugasan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Penugasan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="separator my-5"></div>

    <div class="card card-p-2 card-flush">
        <div class="card-header align-items-center pt-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon fs-1 position-absolute ms-4"><i class="bi bi-search fs-2"></i></span>
                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari lembar kerja" />
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle table-striped table-row-dashed fs-6 g-5 px-5" id="kt_datatable_example">
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                        <th class="w-20px text-center">No.</th>
                        <th class="min-w-150px">Kelompok</th>
                        <th class="min-w-150px">Deskripsi</th>
                        <th class="min-w-150px">Waktu</th>
                        <th class="min-w-150px">Aksi</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @foreach ($assignment as $index => $row)
                    <tr class="odd">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark fw-bolder text-hover-primary mb-1">{{$row->team->name}}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark text-hover-primary mb-1">{{$row->description()}} <i class="bi"></i></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark text-hover-primary mb-1">{{$row->timestamp()}}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                            <button type="button" class="btn btn--light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1_{{$row->id}}">
                                <i class="bi-pencil-fill"></i> Lihat
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--begin::Modal -->
@include('pages.admin.assignment.modal')
<!--end::Modal -->


@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modalElement = document.getElementById('kt_modal_stacked_1');
    modalElement.addEventListener('shown.bs.modal', function (event) {
        var button = event.relatedTarget;
        var orwId = button.getAttribute('data-id');
        var modalBody = modalElement.querySelector('.modal-body');
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeButtons = document.querySelectorAll('.like-btn');

        likeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const assignmentId = this.getAttribute('data-assignment-id');
                const icon = this.querySelector('i');

                fetch(`/assignment/${assignmentId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Make sure to include CSRF token for Laravel
                    },
                    body: JSON.stringify({
                        assignment_id: assignmentId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.liked) {
                        // If liked, change icon to filled heart
                        icon.classList.remove('bi-heart');
                        icon.classList.add('bi-heart-fill');
                    } else {
                        // If unliked, change icon to unfilled heart
                        icon.classList.remove('bi-heart-fill');
                        icon.classList.add('bi-heart');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>
@endsection
