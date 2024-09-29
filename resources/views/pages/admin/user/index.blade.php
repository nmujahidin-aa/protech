@extends('layouts.app-admin')
@section('title', 'Pre-Test | VARK LMS')

@section('content')

<div class="container px-10 py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">User</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{route('dashboard.dashboard.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>

            <div class="col-auto">
                <a class="btn btn-primary" href="{{route('dashboard.user.edit')}}">
                    <i class="ki-solid ki-plus-square  fs-2"></i> Tambah
                </a>
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
                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Soal" />
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Export dropdown-->
                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                    Export Report
                </button>
                <!--begin::Menu-->
                <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="copy">
                        Copy to clipboard
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="excel">
                        Export as Excel
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="csv">
                        Export as CSV
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="pdf">
                        Export as PDF
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--end::Export dropdown-->

                <!--begin::Hide default export buttons-->
                <div id="kt_datatable_example_buttons" class="d-none"></div>
                <!--end::Hide default export buttons-->
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle table-striped table-row-dashed fs-6 g-5 px-5" id="kt_datatable_example">
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase">
                        <th class="w-20px text-center">No.</th>
                        <th class="min-w-200px">Nama</th>
                        <th class="min-w-100px">Progress</th>
                        <th class="min-w-150px">Bergabung pada</th>
                        <th class="min-w-150px">Aksi</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @foreach ($user as $index => $row)
                    <tr class="odd">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="{{route('dashboard.user.edit',$row->id)}}" class="text-dark fw-bolder text-hover-primary mb-1">
                                        <span class="mb-0">{{$row->name}}</span><br>
                                        <span class="fw-normal text-gray-600">{{$row->email}}</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>Belum ada progress</span>
                        </td>
                        <td data-order="2022-03-10T14:40:00+05:00">{{$row->created_at}}</td>
                        <td>
                            <div class="btn-group" role="group">
                            <a class="btn btn-light-primary btn-sm" href="{{route('dashboard.user.edit', $row->id)}}">
                                <i class="bi-pencil-fill"></i> Ubah
                            </a>

                            <!-- Button Group -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-light-danger btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="tableEditDropdown" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="tableEditDropdown">
                                <button class="dropdown-item btn-delete" data-id="{{$row->id}}">
                                    <i class="bi-trash dropdown-item-icon"></i> Hapus
                                </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<form id="frmDelete" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id"/>
</form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $(document).on("click", ".btn-delete", function(){
            let id = $(this).data("id");

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan. Apakah Anda tetap ingin melanjutkan?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#frmDelete").attr("action", "{{ route('dashboard.user.single_destroy', '_id_') }}".replace("_id_", id));
                    $("#frmDelete").find('input[name="id"]').val(id);
                    $("#frmDelete").submit();
                }
            })
        });
    });
</script>
@endsection
