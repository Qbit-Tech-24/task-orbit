@extends('layouts.admin')
@section('title', 'Manage Company')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Company</h3>
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
                    <a href="#">Company List</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="row">
            <div class="card">
                <div class="row">
                    <div class="card-header header-bg-1">
                        <div class="d-flex">
                            <h4 class="card-title">Add Company</h4>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <form class="row g-3" action="{{ route('companies.save') }}" method="POST"
                                    enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                name="company_name" />
                                            @error('company_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Company Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address" rows="4"
                                                cols="4"></textarea>
                                            @error('company_address')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label">District </label>
                                        <input type="text"
                                            class="form-control @error('district') is-invalid @enderror"
                                            name="district" />
                                            @error('district')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Zipcode </label>
                                        <input type="text"
                                            class="form-control @error('zipcode') is-invalid @enderror"
                                            name="zipcode" />
                                            @error('zipcode')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Contact Number </label>
                                        <input type="text"
                                            class="form-control @error('contact_no') is-invalid @enderror"
                                            name="contact_no" />
                                            @error('contact_no')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label"> Whatsapp Number </label>
                                            <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" />
                                                @error('whatsapp_number')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Land Line Number </label>
                                        <input type="text"
                                            class="form-control @error('land_phone_no') is-invalid @enderror"
                                            name="land_phone_no" />
                                            @error('land_phone_no')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Email Address </label>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email" />
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Company Website </label>
                                        <input type="text"
                                            class="form-control @error('company_website') is-invalid @enderror"
                                            name="company_website" />
                                            @error('company_website')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label"> Company Facebook Url </label>
                                            <input type="text"
                                            class="form-control @error('facebook_url') is-invalid @enderror"
                                            name="facebook_url" />
                                            @error('facebook_url')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Company Logo </label>
                                        <input type="file"
                                            class="form-control @error('company_logo') is-invalid @enderror"
                                            name="company_logo" />
                                            @error('company_logo')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                        <label class="form-label"> Registration Number </label>
                                        <input type="text"
                                            class="form-control @error('registration_no') is-invalid @enderror"
                                            name="registration_no" />
                                            @error('registration_no')
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
                                                <button type="submit" class="btn btn-primary">Add Company</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 d-flex">
                            <div class="card border shadow-none w-100">
                                @include('backend.pages.company.partials.table')
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
    function confirmDelete(liId) {
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
                document.getElementById('delete-form-' + liId).submit();
            }
        })
    }
</script>
@endpush
