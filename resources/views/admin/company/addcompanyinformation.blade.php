@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
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
                        <a href="#">Add Company Information</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="card-header header-bg-1">
                            <div class="d-flex">
                                <h4 class="card-title">Add Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="" action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("POST")
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="company_name">Company Name</label>
                                        <input id="company_name" name="company_name" type="text" class="form-control" placeholder="Company Name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="company_address">Address</label>
                                        <input id="company_address" name="company_address" type="text" class="form-control" placeholder="Company Address">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="contact_number">Contact Number</label>
                                        <input id="contact_number" name="contact_number" type="text" class="form-control" placeholder="Contact Number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="whatsapp_number">WhatsApp Number</label>
                                        <input id="whatsapp_number" name="whatsapp_number" type="text" class="form-control" placeholder="WhatsApp Number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="email_address">Email Address</label>
                                        <input id="email_address" name="email_address" type="email" class="form-control" placeholder="Email Address">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="website">Website</label>
                                        <input id="website" name="website" type="url" class="form-control" placeholder="Website URL">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="fb_url">Facebook URL</label>
                                        <input id="fb_url" name="fb_url" type="url" class="form-control" placeholder="Facebook URL">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="main_logo">Main Logo</label>
                                        <input id="main_logo" name="main_logo" type="file" class="form-control">
                                        <img id="main_logo_preview" alt="Main Logo Preview" width="100" class="mb-2 d-none mt-2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="secondary_logo">Secondary Logo</label>
                                        <input id="secondary_logo" name="secondary_logo" type="file" class="form-control">
                                        <img id="secondary_logo_preview" alt="Secondary Logo Preview" width="100" class="mb-2 d-none mt-2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="favicon">Favicon</label>
                                        <input id="favicon" name="favicon" type="file" class="form-control">
                                        <img id="favicon_preview" alt="Favicon Preview" width="50" class="mb-2 d-none mt-2">
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-end mt-4">
                                    <button type="Submit" class="ms-2 btn btn-secondary">Submit</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    const contactNumberInput = document.getElementById('contact_number');

    contactNumberInput.addEventListener('keydown', function(event) {
        if (event.key === ' ') {
            event.preventDefault();
            // Only add a comma if the last character is not already a comma or space
            if (contactNumberInput.value && !contactNumberInput.value.endsWith(',')) {
                contactNumberInput.value += ', ';
            }
        }
    });
</script>
@endpush
