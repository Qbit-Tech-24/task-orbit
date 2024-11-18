@extends('layouts.app')
@section('title', 'Support Ticket Details')
@push('custom_css')
@endpush
@section('client_content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Clients</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        Details Ticket
                    </li>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show bg-primary text-white" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show bg-primary text-white" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                            <form class="check" action="{{ route('ticket.comment.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $support_tickets->id }}">
                                <div class="form-group">
                                   
                                    <div class="form-check form-switch">
                                        <input 
                                            class="form-check-input statusToggle" 
                                            type="checkbox" 
                                            id="statusToggle" 
                                            value="Closed" 
                                            data-ticket-id="{{ $support_tickets->id }}" 
                                            {{ $support_tickets->status === 'Closed' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusToggle">
                                            {{ $support_tickets->status === 'Closed' ? 'Closed' : 'Open' }}
                                        </label>
                                    </div>
                                    
                                    
                                    <textarea name="msg" class="form-control @error('msg') is-invalid @enderror" placeholder="Type your message"></textarea>
                                    @error('msg')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="attachment">Upload file</label>
                                    <input type="file" name="attachment" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Reply</button>
                            </form>
                        </div>
                    </div>
                
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Comments</h5>
                            @if($support_tickets->comments->isNotEmpty())
                                @foreach($support_tickets->comments as $comment)
                                    <div class="d-flex mt-3">
                                        <div class="flex-1">
                                            <h6>{{ $comment->user ? $comment->user->name : $comment->client->name }} 
                                                <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small>
                                            </h6>
                                            <p>{{ $comment->comments }}</p>
                                            
                                            @if($comment->attachment)
                                                @php
                                                    $extension = pathinfo($comment->attachment, PATHINFO_EXTENSION);
                                                @endphp
                                                
                                                @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <!-- Display Image -->
                                                    <img src="{{ asset('uploads/attachments/comments/' . $comment->attachment) }}" alt="Attachment" class="img-fluid mt-2" style="max-width:100px; max-height: 100px;">
                                                @elseif(in_array(strtolower($extension), ['pdf', 'doc', 'docx']))
                                                    <!-- Display File Link -->
                                                    <a href="{{ asset('uploads/attachments/comments/' . $comment->attachment) }}" target="_blank" class="btn btn-primary btn-sm mt-2">View File</a>
                                                @else
                                                    <!-- Handle Other File Types -->
                                                    <p class="text-warning mt-2">Unsupported file type.</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <p>No comments available.</p>
                            @endif
                        </div>
                    </div>
                    
                    
                </div>
                
                <div class="col-md-4">
                    <div class="card card-round">
                        <div class="card-body">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">Ticket Details</div>
                            </div>
                            <div class="card-list py-4">
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Ticket Number</div>
                                        <div class="status">{{ $support_tickets->ticket_number }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Client Name</div>
                                        <div class="status">{{ $support_tickets->clientname->name }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Category</div>
                                        <div class="status">{{  $support_tickets->category->ticket_category }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Subject</div>
                                        <div class="status">{{  $support_tickets->subject }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Project</div>
                                        <div class="status">{{  $support_tickets->project_name }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Priority</div>
                                        <div class="status">{{  $support_tickets->priority }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Status</div>
                                        <div class="status">{{  $support_tickets->status }}</div>
                                    </div>
                                </div>
                                <div class="item-list"> 
                                    <div class="info-user ms-3">
                                        <div class="username">Created at</div>
                                        <div class="status">{{ date('j F Y',strtotime($support_tickets->created_at ))}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>

        </div>
    </div>
@endsection
@push('clientjs')
<script>
document.querySelectorAll('.statusToggle').forEach(function (toggle) {
    toggle.addEventListener('change', function (event) {
        event.preventDefault(); // Prevent default behavior
        let ticketId = this.getAttribute('data-ticket-id');
        let status = this.checked ? 'Closed' : 'Open';
        let label = this.nextElementSibling;

        // SweetAlert confirmation dialog
        Swal.fire({
            title: "Are you sure?",
            text: "You want to change the status to " + status + "?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, update it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform AJAX request
                $.ajax({
                    url: `/client/ticket/${ticketId}/${status}`,
                    type: 'GET',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (data) {
                        if (data.success) {
                            // Update label text dynamically
                            label.textContent = status;

                            // SweetAlert success message
                            Swal.fire("Updated!", "The status has been updated.", "success").then(() => {
                                // Reload the page after confirmation
                                location.reload();
                            });
                        } else {
                            // Reset toggle to previous state if update fails
                            toggle.checked = !toggle.checked;

                            // SweetAlert error message
                            Swal.fire("Error!", data.message || "Failed to update status.", "error");
                        }
                    },
                    error: function () {
                        // Reset toggle to previous state on error
                        toggle.checked = !toggle.checked;

                        Swal.fire("Error!", "An error occurred. Please try again.", "error");
                    }
                });
            } else {
                // Reset toggle to previous state if user cancels
                toggle.checked = !toggle.checked;
            }
        });
    });
});

</script>
@endpush
