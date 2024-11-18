@extends('layouts.admin')
@section('title', 'Manage Department')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Department</h3>
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
                    <a href="#">Department List</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="row">
            <div class="card">
                <div class="row">
                    <div class="card-header header-bg-1">
                        <div class="d-flex">
                            <h4 class="card-title">Add Department</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4 d-flex">
                                <div class="card border shadow-none w-100">
                                    <div class="card-body">
                                        <form class="row g-3" action="{{ route('departments.store') }}" method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label class="form-label">Depertment Name <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control @error('deptName') is-invalid @enderror"
                                                    placeholder="Depertment Name" name="deptName" value="{{ old('deptName') }}" />
                                                @error('deptName')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label"> Company  <span class="text-danger">*</span> </label>
                                                <select class="form-select @error('companies_id') is-invalid @enderror" name="companies_id">
                                                    @if($company->isNotEmpty())
                                                        @foreach($company as $cmp)
                                                            <option value="{{ $cmp->id}}">{{ $cmp->company_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('companies_id')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                                @error('status')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Add Depertment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 d-flex">
                                <div class="card border shadow-none w-100">
                                    @include('backend.pages.department.partials.table')
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
    function confirmDelete(listId) {
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
                document.getElementById('delete-form-' + listId).submit();
            }
        })
    }
</script>
@endpush
