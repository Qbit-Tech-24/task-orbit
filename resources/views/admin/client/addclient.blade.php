@extends('layouts.admin')
@section('content')
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
                <li class="nav-item">
                    <a href="#">Manage Clients</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-bg-1">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Client</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Person/Organization</label>
                        </div>
                        <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="personal_info">
                                <h4>Person</h4>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_name">Client Name</label>
                                        <input id="client_name" type="text" class="form-control" placeholder="fill name"
                                            name="client_name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_designation">Designation</label>
                                        <input id="client_designation" type="text" class="form-control"
                                            placeholder="fill designation" name="client_designation" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_name">Company Name</label>
                                        <input id="company_name" type="text" class="form-control"
                                            placeholder="fill company name" name="company_name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_address">Company Address</label>
                                        <input id="company_address" type="text" class="form-control"
                                            placeholder="fill company address" name="company_address">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_phone">Company Phone</label>
                                        <input id="company_phone" type="text" class="form-control"
                                            placeholder="fill company phone" name="company_phone" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_website">Company Website</label>
                                        <input id="company_website" type="text" class="form-control"
                                            placeholder="fill company website" name="company_website">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_email">Company Email</label>
                                        <input id="company_email" type="email" class="form-control"
                                            placeholder="fill company email" name="company_email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_fb_url">Company FB url</label>
                                        <input id="company_fb_url" type="text" class="form-control"
                                            placeholder="fill company fb url" name="company_fb_url">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_logo">Company Logo</label>
                                        <input id="company_logo" type="file" class="form-control"
                                            placeholder="fill company logo" name="company_logo">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="business_card">Business Card</label>
                                        <input id="business_card" type="file" class="form-control"
                                            placeholder="fill Business Card" name="business_card">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_phone">Personal Phone</label>
                                        <input id="client_phone" type="text" class="form-control"
                                            placeholder="fill Client phone" name="client_phone">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_email">Email Address</label>
                                        <input id="client_email" type="email" class="form-control"
                                            placeholder="fill Client email" name="client_email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_mailing_address">Mailing Address</label>
                                        <textarea id="client_mailing_address" class="form-control"
                                            placeholder="fill client mailing address"
                                            name="client_mailing_address"></textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_passport_image">Passport Image</label>
                                        <input id="client_passport_image" type="file" class="form-control"
                                            placeholder="fill client passport image" name="client_passport_image">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_nid_number">NID Number</label>
                                        <input id="client_nid_number" type="number" class="form-control"
                                            placeholder="fill client nid number" name="client_nid_number">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_nid_image">NID Image</label>
                                        <input id="client_nid_image" type="file" class="form-control"
                                            placeholder="fill client nid image" name="client_nid_image">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="documents">Documents</label>
                                        <input id="documents" type="file" class="form-control"
                                            placeholder="fill client documents" name="documents">
                                    </div>
                                </div>
                                <button class="btn btn-primary ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Clients
                                </button>
                            </div>

                        </form>
                        <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="organizational_info">
                                <h4>Organization</h4>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_name">Organization Name</label>
                                        <input id="organizational_name" type="text" class="form-control"
                                            placeholder="fill name" name="organizational_name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_phone_number">Organization Phone
                                            Number</label>
                                        <input id="organizational_phone_number" type="text" class="form-control"
                                            placeholder="fill organizational phone number"
                                            name="organizational_phone_number" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_whatsapp_number">Organization
                                            WhatsApp Number</label>
                                        <input id="organizational_whatsapp_number" type="text" class="form-control"
                                            placeholder="fill organizational whatsapp number"
                                            name="organizational_whatsapp_number" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_email">Organization Email</label>
                                        <input id="organizational_email" type="email" class="form-control"
                                            placeholder="fill organizational email" name="organizational_email" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_address">Organizational
                                            Address</label>
                                        <input id="organizational_address" type="text" class="form-control"
                                            placeholder="fill organizational address" name="organizational_address">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_website">Organizational Website</label>
                                        <input id="organizational_website" type="text" class="form-control"
                                            placeholder="fill organizational website" name="organizational_website">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_fb_url">Organizational FB URL</label>
                                        <input id="organizational_fb_url" type="text" class="form-control"
                                            placeholder="fill organizational fb url" name="organizational_fb_url">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_logo">Organizational Logo</label>
                                        <input id="organizational_logo" type="file" class="form-control"
                                            placeholder="fill organizational logo" name="organizational_logo">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_business_card">Organizational Business Card</label>
                                        <input id="organizational_business_card" type="file" class="form-control"
                                            placeholder="fill Business Card" name="organizational_business_card">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_other_documents">Others Documents</label>
                                        <input id="organizational_other_documents" type="file" class="form-control"
                                            placeholder="fill organizational other documents"
                                            name="organizational_other_documents">
                                    </div>
                                </div>
                                <h4>Contact Person</h4>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_name">Name</label>
                                        <input id="contact_name" type="text" class="form-control"
                                            placeholder="fill name" name="contact_name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_designation">Designation</label>
                                        <input id="contact_designation" type="text" class="form-control"
                                            placeholder="fill designation" name="contact_designation" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_company">Company</label>
                                        <input id="contact_company" type="text" class="form-control"
                                            placeholder="fill company" name="contact_company">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_phone">Phone</label>
                                        <input id="contact_phone" type="text" class="form-control"
                                            placeholder="fill phone" name="contact_phone" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_whatsapp">WhatsApp</label>
                                        <input id="contact_whatsapp" type="text" class="form-control"
                                            placeholder="fill whatsapp" name="contact_whatsapp" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_email">Email</label>
                                        <input id="contact_email" type="email" class="form-control"
                                            placeholder="fill email" name="contact_email" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_business_card">Business Card</label>
                                        <input id="contact_business_card" type="file" class="form-control"
                                            placeholder="fill Business Card" name="contact_business_card">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_nid_number">NID Number</label>
                                        <input id="contact_nid_number" type="text" class="form-control"
                                            placeholder="fill NID Number" name="contact_nid_number">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_nid_image">NID Image</label>
                                        <input id="contact_nid_image" type="file" class="form-control"
                                            placeholder="fill NID Image" name="contact_nid_image">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_other_documents">Others Documents</label>
                                        <input id="contact_other_documents" type="file" class="form-control"
                                            placeholder="fill Contact other documents" name="contact_other_documents">
                                    </div>
                                </div>
                                <button class="btn btn-primary ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Clients
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
@push('script')
<script>
    $(document).ready(function () {
        // Initially hide the organization info
        $('.organizational_info').hide();

        $('#flexSwitchCheckDefault').change(function () {
            if ($(this).is(':checked')) {
                $('.personal_info').hide();
                $('.organizational_info').show();
            } else {
                $('.personal_info').show();
                $('.organizational_info').hide();
            }
        });
    });

</script>
@endpush
