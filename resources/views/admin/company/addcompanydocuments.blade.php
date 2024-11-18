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
                                        <label class="form-label" for="official_logo">Official Logo</label>
                                        <input id="official_logo" name="official_logo[]" type="file" class="form-control" multiple>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="official_letterhead">Official Letterhead</label>
                                        <input id="official_letterhead" name="official_letterhead[]" type="file" class="form-control" multiple>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="trade_license_number">Trade License Number</label>
                                        <input id="trade_license_number" name="trade_license_number" type="text" class="form-control" placeholder="Trade License Number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="trade_license_image">Trade License Image</label>
                                        <input id="trade_license_image" name="trade_license_image" type="file" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="tin_number">TIN Number</label>
                                        <input id="tin_number" name="tin_number" type="text" class="form-control" placeholder="TIN Number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="tin_image">TIN Image</label>
                                        <input id="tin_image" name="tin_image" type="file" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="bin_number">BIN Number</label>
                                        <input id="bin_number" name="bin_number" type="text" class="form-control" placeholder="BIN Number">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="bin_image">BIN Image</label>
                                        <input id="bin_image" name="bin_image" type="file" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="agreement">Agreement</label>
                                        <input id="agreement" name="agreement[]" type="file" class="form-control" multiple>
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
