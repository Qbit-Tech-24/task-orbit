@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Board</h3>
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
                    <a href="#">Manage Board</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-bg-1">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Board List</h4>
                            <div class="ms-md-auto py-md-0">
                                <!-- Button trigger modal -->
                                 <button class="btn btn-primary btn-round" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Board</button>
                             </div>
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered">
                                     <div class="modal-content">
                                         <!-- Modal Header -->
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Add Board</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>

                                         <!-- Modal Body -->
                                         <div class="modal-body">
                                             <div class="card shadow-sm border-0">
                                                 <div class="card-body">
                                                     <form action="{{ route('boards.store') }}" method="POST" enctype="multipart/form-data">
                                                         @csrf
                                                         @method("POST")

                                                         <!-- Name Field -->
                                                         <div class="mb-3">
                                                             <label for="name" class="form-label">Board Name</label>
                                                             <input type="text" class="form-control" id="name" name="name" placeholder="Enter board name" required>
                                                         </div>

                                                         <!-- Modal Footer -->
                                                         <div class="d-flex justify-content-end mt-4">
                                                             <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                                             <button type="submit" class="btn btn-primary">Save</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th style="align-center ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boards as $board)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $board->name }}</td>
                                        <td>{{ $board->admin->name }}</td>
                                        <td>{{ $board->formatted_created_at }}</td>
                                        <td>
                                            @if ($board->is_enabled)
                                                Enabled
                                            @else
                                                Disabled
                                            @endif
                                        </td>

                                        <td>
                                            <div class="form-button-action align-items-center">
                                                <a href="{{ route('boards.show', $board->id) }}" type="button" data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="View Board" style="display: inline;">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <form action="{{ route('boards.toggleStatus', $board->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-link" style="border: none; background: transparent;">
                                                        @if ($board->is_enabled)
                                                            <i class="fas fa-toggle-on" style="color: green;"></i> <!-- Icon for "Enabled" -->
                                                        @else
                                                            <i class="fas fa-toggle-off" style="color: red;"></i> <!-- Icon for "Disabled" -->
                                                        @endif
                                                    </button>
                                                </form>
                                                <form action="{{ route('boards.destroy', $board) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="btn btn-link btn-danger" onclick="return confirm('Are you sure?');">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

