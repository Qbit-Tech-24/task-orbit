@extends('layouts.admin')
@section('title', 'Update Designation')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Designation</h3>
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
                    <a href="#">Designation List</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="row">
            <div class="card">
                <div class="row">
                    <div class="card-header header-bg-1">
                        <div class="d-flex">
                            <h4 class="card-title">Update Designation</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4 d-flex">
                                <div class="card border shadow-none w-100">
                                    <div class="card-body">
                                        <form class="row g-3" action="{{ route('designation.update',$designation->id) }}" method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label class="form-label">Designation Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('designation_name') is-invalid @enderror"
                                                placeholder="Designation Name" name="designation_name" value="{{ $designation->designation_name ?? '' }}">
                                                @error('designation_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Designation Short Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('designation_shortname') is-invalid @enderror"
                                                placeholder="Designation Short Name" name="designation_shortname" value="{{ $designation->designation_shortname ?? '' }}">
                                                @error('designation_shortname')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Designation Code <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('designation_code') is-invalid @enderror"
                                                    placeholder="Designation Code" name="designation_code"
                                                    value="{{ $designation->designation_code ?? '' }}">
                                                @error('designation_code')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                                    <option value="Active"
                                                        {{ isset($designation) && $designation->status == 'Active' ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="Inactive"
                                                        {{ isset($designation) && $designation->status == 'Inactive' ? 'selected' : '' }}>
                                                        Inactive
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Update Designation</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 d-flex">
                                <div class="card border shadow-none w-100">
                                    @include('backend.pages.designation.partials.table')
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
    function confirmDelete(desId) {
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
                document.getElementById('delete-form-' + desId).submit();
            }
        })
    }
</script>
@endpush
