@extends('layouts.app')
@section('title', 'Penugasan | PROTECH')
@section('style')
<style>
    .image-wrapper {
        position: relative;
        display: inline-block;
        overflow: hidden;
        border: none;
        padding: 0;
        background: none;
    }

    .image-wrapper img {
        transition: all 0.3s ease-in-out;
        width: 100%;
        display: block;
    }

    .image-wrapper:hover img {
        filter: brightness(50%); /* Buat gambar lebih gelap */
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1); /* Overlay transparan */
        opacity: 0; /* Tidak terlihat sebelum hover */
        transition: opacity 0.3s ease-in-out;
    }

    .image-wrapper:hover .overlay {
        opacity: 1; /* Tampilkan overlay ketika hover */
    }

    .overlay-title {
        font-size: 1.5rem; /* Ukuran teks di atas ikon */
        text-align: center;
    }

    .overlay i {
        color: white;
        transition: transform 0.3s ease-in-out;
    }

    .overlay span {
        color: white;
    }

    .image-wrapper:hover .overlay i {
        transform: scale(1.2); /* Perbesar ikon sedikit saat hover */
    }

    .overlay .d-flex {
        gap: 1rem; /* Jarak antar ikon */
    }
    .custom-modal-size {
        max-width: 90vw; /* Atur lebar maksimum modal menjadi 90% dari viewport */
        width: 100%; /* Pastikan modal menggunakan 100% dari lebar yang ditentukan */
    }
</style>
@endsection
@section('content')
<div class="d-flex justify-content-center align-items-center" style="flex: 1; margin-top: -50px;">
    <div style="width: 75%">
        <div class="card px-2 pt-8" style="background-color: rgba(0, 0, 0, 0.4); border: 5px solid #cccccc; max-height: 75%;">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto; padding: 10px; scrollbar-width: none; -ms-overflow-style: none;">
                <div class="d-flex justify-content-center" style="position: absolute; top: -40px; width: 100%;">
                    <div class="bg-light rounded py-3" style="border: solid 3px #cccccc;"><h1 class="custom-font px-10">Penugasan</h1></div>
                </div>

                <div class="row gy-5 py-8">
                    @foreach ($assignment as $index => $row)
                    <div class="col-md-4 col-sm-12 position-relative">
                        <!-- Wrapper button -->
                        <button class="image-wrapper" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1_{{$row->id}}">
                            <img src="{{ asset('storage/' . $row->image) }}" alt="poster" class="img-fluid">

                            <!-- Overlay with text, icons, and numbers -->
                            <div class="overlay d-flex flex-column justify-content-center align-items-center">
                                <p class="overlay-title text-white mb-4">{{$row->team->name}}</p> <!-- Teks di atas ikon -->
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="d-flex align-items-center me-4">
                                        <i class="bi bi-heart-fill text-white fs-1"></i> <!-- Icon Love -->
                                        <span class="text-white fs-5 ms-2">{{ optional($row->likes)->count() ?? 0 }}</span> <!-- Angka di sebelah icon love -->
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-chat-fill text-white fs-1"></i> <!-- Icon Comment -->
                                        <span class="text-white fs-5 ms-2">{{ optional($row->comments)->count() ?? 0 }}</span> <!-- Angka di sebelah icon comment -->
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                    @endforeach
                </div>


                <div class="d-flex justify-content-center" style="position: absolute; bottom: -25px; right: 10px;">
                    <a href="{{route('assignment.index')}}" class="circlebutton">
                        <i class="ki-solid ki-arrow-left fs-1 text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.user.assignment.modal')
@endsection

@section('scripts')
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

{{-- <div class="card background" style="background-color: #9945d6;">
                            <div class="card-body text-center">
                                <h4 class="recoleta text-warning">Kelompok 1</h4>
                                <div class="row">
                                    <div class="col-md-5 col-sm-12">
                                        <img src="{{ asset('storage/' . $row->image) }}" alt="poster" style="width: 100%;">
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <p class="text-light text-start">{{$row->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
