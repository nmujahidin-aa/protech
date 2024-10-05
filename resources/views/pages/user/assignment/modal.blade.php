@foreach ($assignment as $index => $row)
<div class="modal fade" tabindex="-1" id="kt_modal_stacked_1_{{$row->id}}">
    <div class="modal-dialog modal-dialog-centered custom-modal-size">
        <div class="modal-content">
            <div class="row g-0">
                <div class="col d-flex justify-content-center align-items-center bg-secondary" style="height: 90vh;">
                    <img src="{{ asset('storage/' . $row->image) }}" alt="poster" style="max-height:90vh; width: auto;">
                </div>
                <div class="col d-flex flex-column">
                    <div class="modal-header">
                        <h3 class="modal-title">{{$row->team->name}}</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>

                    <div class="modal-body" style="flex: 1 1 auto; overflow-y: auto; max-height: 70vh;">
                        <div>{{$row->description}}</div>
                        <small class="text-primary">{{$row->timestamp()}}</small>

                        <!-- Comment Section -->
                        @foreach ($comment as $result)
                            @if ($result->assignment_id == $row->id)
                            <div class="mt-3">
                                <div class="fw-bold">{{$result->user->name}} <small class="text-primary">{{$result->timestamp()}}</small>
                                </div>
                                <span>{{$result->content}}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Footer with Like Button and Form -->
                    <div class="modal-footer d-flex justify-content-between align-items-center p-2">
                        <!-- Like Button -->
                        <button type="button" class="btn btn-light btn-sm like-btn" data-assignment-id="{{ $row->id }}">
                            <i class="bi {{ $row->isLikedByUser() ? 'bi-heart-fill' : 'bi-heart' }} fs-1 text-danger"></i>
                        </button>

                        <!-- Form -->
                        <form class="d-flex ms-2" style="width: 87%;" action="{{route('assignment.comment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="assignment_id" value="{{ $row->id }}">
                            <input type="text" name="content" class="form-control border-0" placeholder="Type your message..." style="border-radius: 0;">
                            <button type="submit" class="btn btn-primary ms-2">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
