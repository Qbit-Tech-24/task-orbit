@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Team</h3>
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
                    <a href="#">Manage Team</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-bg-1">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Team List</h4>
                            <div class="ms-md-auto py-md-0">
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary btn-round" type="button" data-bs-toggle="modal"
                                    data-bs-target="#teamModal">Add Team</button>
                            </div>
                        </div>
                    </div>
                    @include('admin.team.partial.edit_team_modal')
                    @include('admin.team.partial.add_member_modal')
                    @include('admin.team.partial.add_team_modal')

                    <!-- Table for displaying teams -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Members</th>
                                        <th style="align-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>
                                                <ol>
                                                    @foreach($team->employees as $employee)
                                                        <li>{{ $employee->employee_name }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>
                                                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                    <a href="#" class="text-primary" data-bs-toggle="modal"
                                                        data-bs-target="#memberModal-{{ $team->id }}" title="Add Member">
                                                        <i class="fa fa-user-plus"></i>
                                                    </a>
                                                    <a href="#" class="text-warning" title="Edit" data-bs-toggle="modal"
                                                        data-bs-target="#editTeamModal-{{ $team->id }}"
                                                        data-id="{{ $team->id }}" data-name="{{ $team->name }}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <a href="javascript:;"
                                                        onclick="event.preventDefault(); confirmDelete('{{ $team->id }}');"
                                                        class="text-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Delete"
                                                        data-bs-original-title="Delete" aria-label="Delete"><i
                                                            class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $team->id }}"
                                                        action="{{ route('teams.destroy', $team->id) }}" method="POST"
                                                        style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
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


@push('script')

<script type="text/javascript">
    function confirmDelete(teamId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + teamId).submit();
            }
        })
    }

    // select2
    $(document).ready(function () {
        // Initialize Select2 on all multiple select dropdowns
        $('.multiple-select-field').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Select Employees',
            closeOnSelect: false
        });
    });

</script>
@endpush
