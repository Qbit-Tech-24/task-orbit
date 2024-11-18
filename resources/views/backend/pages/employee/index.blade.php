@extends('layouts.admin')
@section('title', 'Manage Employee')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Employee</h3>
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
                    <a href="#">Employee List</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="card-header header-bg-1">
                            <div class="d-flex">
                                <h4 class="card-title">Manage Employee</h4>
                                <div class="ms-md-auto py-md-0">
                                    <!-- Button trigger modal -->
                                    <a href="{{ route('employees.create') }}" class="btn btn-primary btn-round">Add
                                        Employee</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-3">
                                <table class="table align-middle" id="example">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Department</th>
                                            <th>Employee ID</th>
                                            <th>Join Date</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($employees->isNotEmpty())
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $employee->passport_photo) }}"
                                                        class="rounded-circle" width="44" height="44"
                                                        alt="{{ $employee->employee_name }}">
                                            </td>
                                            <td>{{$employee->employee_name ?? '' }}</td>
                                            <td>{{ $employee->company->company_name ?? '' }}</td>
                                            <td>{{ $employee->department->deptName ?? '' }}</td>
                                            <td>{{ $employee->employee_id ?? '' }}</td>
                                            <td>{{ date('j F y',strtotime($employee->joining_date)) }}</td>
                                            <td>{{ $employee->email ?? '' }}</td>
                                            <td>
                                                <div class="table-actions d-flex align-items-center gap-3 fs-6">

                                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                                        class="text-warning"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        title="Edit">
                                                        <i class="fa fa-pen"></i>
                                                     </a>

                                                    <a href="javascript:;"
                                                        onclick="event.preventDefault(); confirmDelete('{{ $employee->id }}');"
                                                        class="text-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Delete" aria-label="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $employee->id }}"
                                                        action="{{ route('employee.delete', $employee->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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
        function confirmDelete(employeeId) {
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
                document.getElementById('delete-form-' + employeeId).submit();
            }
        })
    }
    </script>
    @endpush
