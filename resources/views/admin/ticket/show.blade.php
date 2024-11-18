@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Admin</h3>
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
                        <a href="#">Manage Support Ticket</a>
                    </li>
                </ul>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('ticket_comment.reply') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $support_tickets->id }}">
                                <div class="form-group">
                                   
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
                            @if ($support_tickets->comments->isNotEmpty())
                                @foreach ($support_tickets->comments as $comment)
                                    <div class="d-flex mt-3">
                                        <div class="flex-1">
                                            @if ($comment->client)
                                                <h6>
                                                    {{ $comment->client->name }}
                                                    <small
                                                        class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small>
                                                </h6>
                                            @endif
                                            @if ($comment->user)
                                                <h6>
                                                    {{ $comment->user->name }}
                                                    <small
                                                        class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small>
                                                </h6>
                                            @endif
                                            <p>{{ $comment->comments }}</p>

                                            @if ($comment->attachment)
                                                @php
                                                    $extension = pathinfo($comment->attachment, PATHINFO_EXTENSION);
                                                @endphp

                                                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <!-- Display Image -->


                                                    <img src="{{ asset('uploads/attachments/comments/' . $comment->attachment) }}"
                                                        alt="Attachment" class="img-fluid mt-2"
                                                        style="max-width:100px; max-height:100px;">
                                                @elseif(in_array(strtolower($extension), ['pdf', 'doc', 'docx']))
                                                    <!-- Display File Link -->
                                                    <a href="{{ asset('uploads/attachments/comments/' . $comment->attachment) }}"
                                                        target="_blank" class="btn btn-primary btn-sm mt-2">
                                                        View File
                                                    </a>
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
                                        <div class="status">{{ $support_tickets->name }}</div>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username">Category</div>
                                        <div class="status">{{ $support_tickets->ticket_category }}</div>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username">Subject</div>
                                        <div class="status">{{ $support_tickets->subject }}</div>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username">Project</div>
                                        <div class="status">{{ $support_tickets->project_name }}</div>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username">Priority</div>
                                        <div class="status">{{ $support_tickets->priority }}</div>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username">Status</div>
                                        <div class="status">{{ $support_tickets->status }}</div>
                                    </div>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username">Created at</div>
                                        <div class="status">{{ date('j F Y', strtotime($support_tickets->created_at)) }}
                                        </div>
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
@push('script')
<script>

</script>
@endpush
