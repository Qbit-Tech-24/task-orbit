@extends('layouts.app')
@section('title', 'Open Support Ticket')
@push('custom_css')
    <style>
        .note-editor.note-frame {
            background-color: #fefefe !important;
            color: #000 !important;
            /* Ensures text color is black for readability */
        }
    </style>
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
                    Create Ticket
                </ul>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="card">
                       
                        <div class="card-body">
                            <form action="{{ route('support_ticket_high') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="personal_info">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="name"> Name</label>
                                            <input id="name" type="text" class="form-control" placeholder="name"
                                                value="{{ Auth::guard('clinetuser')->user()->name }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="project_name"> Email</label>
                                            <input id="email" type="email" class="form-control" placeholder="email"
                                                value="{{ Auth::guard('clinetuser')->user()->email }}" readonly />
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="form-label" for="subject">Subject Name</label>
                                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                                                placeholder="subject name" name="subject"  />
                                                @error('subject')
                                                 <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="project_name">Project Name</label>
                                            <input id="project_name" type="text" class="form-control  @error('project_name') is-invalid @enderror"
                                                placeholder="proeject name" name="project_name" />
                                                @error('project_name')
                                                <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                        </div>
                                        <input type="hidden" name="client_id"
                                            value="{{ Auth::guard('clinetuser')->user()->id }}" />
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="department">Department</label>
                                            <select id="department" name="department" class="form-control @error('department') is-invalid @enderror">
                                                <option value="Management"> Management</option>
                                                <option value="Technical">Technical</option>
                                            </select>
                                            @error('department')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="priority">Priority</label>
                                            <select id="priority" name="priority" class="form-control @error('priority') is-invalid @enderror">
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low
                                                </option>
                                            </select>
                                            @error('priority')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>                      
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="status">Status</label>
                                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="Open">Open</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Suspend">Suspend</option>
                                                <option value="Closed">Closed</option>
                                                <option value="Solved">Solved
                                                </option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="cat_id">Category</label>
                                            <select id="cat_id" name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                                                @if($categories)
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->ticket_category }}</option>
                                                @endforeach
                                               @endif
                                            </select>
                                            @error('cat_id')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="msg">Message</label>
                                            <textarea id="msg" class="form-control summernote @error('msg') is-invalid @enderror" placeholder="message" name="msg"></textarea>
                                            @error('msg')
                                            <span class="text-danger">{{ $message }}</span>
                                           @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="attachment">Documents</label>
                                            <div id="file-inputs-container">
                                                <div class="input-group mb-2">
                                                    <input type="file" class="form-control" id="attachment"
                                                        name="attachment[]" aria-label="Upload">
                                                    <button class="btn btn-outline-secondary add-button"
                                                        type="button">Add</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-primary ms-auto" type="submit">
                                        Save
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('clientjs')
    <script>
        $(document).on('click', '.add-button', function() {
            // Create a new file input group
            var newInputGroup = `
            <div class="input-group mb-2">
                <input type="file" class="form-control" name="attachment[]" aria-label="Upload">
                <button class="btn btn-outline-danger remove-button" type="button">Remove</button>
            </div>`;

            // Append the new input group to the container
            $('#file-inputs-container').append(newInputGroup);
        });

        // Remove a file input group when the Remove button is clicked
        $(document).on('click', '.remove-button', function() {
            $(this).closest('.input-group').remove();
        });
    </script>
@endpush
