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
                        @if ($client->client_name)
                        <form action="{{ route('client.update', $client->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="personal_info">
                                <h4>Person</h4>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_name">Client Name</label>
                                        <input id="client_name" type="text" class="form-control" placeholder="fill name"
                                            name="client_name" value="{{ old('client_name', $client->client_name) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_designation">Designation</label>
                                        <input id="client_designation" type="text" class="form-control"
                                            placeholder="fill designation" name="client_designation"
                                            value="{{ old('client_designation', $client->client_designation) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_name">Company Name</label>
                                        <input id="company_name" type="text" class="form-control"
                                            placeholder="fill company name" name="company_name"
                                            value="{{ old('company_name', $client->company_name) }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_address">Company Address</label>
                                        <input id="company_address" type="text" class="form-control"
                                            placeholder="fill company address" name="company_address"
                                            value="{{ old('company_address', $client->company_address) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_phone">Company Phone</label>
                                        <input id="company_phone" type="text" class="form-control"
                                            placeholder="fill company phone" name="company_phone"
                                            value="{{ old('company_phone', $client->company_phone) }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_website">Company Website</label>
                                        <input id="company_website" type="text" class="form-control"
                                            placeholder="fill company website" name="company_website"
                                            value="{{ old('company_website', $client->company_website) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_email">Company Email</label>
                                        <input id="company_email" type="email" class="form-control"
                                            placeholder="fill company email" name="company_email"
                                            value="{{ old('company_email', $client->company_email) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_fb_url">Company FB url</label>
                                        <input id="company_fb_url" type="text" class="form-control"
                                            placeholder="fill company fb url" name="company_fb_url"
                                            value="{{ old('company_fb_url', $client->company_fb_url) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="company_logo">Company Logo</label>
                                        <input id="company_logo" type="file" class="form-control"
                                            placeholder="fill company logo" name="company_logo">
                                        @if($client->company_logo)
                                        <img src="{{ asset('storage/' . $client->company_logo) }}" alt="Client Passport"
                                        style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="business_card">Business Card</label>
                                        <input id="business_card" type="file" class="form-control"
                                            placeholder="fill Business Card" name="business_card">
                                        @if($client->business_card)
                                        <img src="{{ asset('storage/' . $client->business_card) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_phone">Personal Phone</label>
                                        <input id="client_phone" type="text" class="form-control"
                                            placeholder="fill Client phone" name="client_phone"
                                            value="{{ old('client_phone', $client->client_phone) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_email">Email Address</label>
                                        <input id="client_email" type="email" class="form-control"
                                            placeholder="fill Client email" name="client_email"
                                            value="{{ old('client_email', $client->client_email) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_mailing_address">Mailing Address</label>
                                        <textarea id="client_mailing_address" class="form-control"
                                            placeholder="fill client mailing address"
                                            name="client_mailing_address">{{ old('client_mailing_address', $client->client_mailing_address) }}</textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_passport_image">Passport Image</label>
                                        <input id="client_passport_image" type="file" class="form-control"
                                            placeholder="fill client passport image" name="client_passport_image">
                                        @if($client->client_passport_image)
                                        <img src="{{ asset('storage/' . $client->client_passport_image) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_nid_number">NID Number</label>
                                        <input id="client_nid_number" type="number" class="form-control"
                                            placeholder="fill client nid number" name="client_nid_number"
                                            value="{{ old('client_nid_number', $client->client_nid_number) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="client_nid_image">NID Image</label>
                                        <input id="client_nid_image" type="file" class="form-control"
                                            placeholder="fill client nid image" name="client_nid_image">
                                        @if($client->client_nid_image)
                                        <img src="{{ asset('storage/' . $client->client_nid_image) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="documents">Documents</label>
                                        <input id="documents" type="file" class="form-control"
                                            placeholder="fill client documents" name="documents">
                                        @if($client->documents)
                                        @php
                                        $filePath = asset('storage/' . $client->documents);
                                        $fileExtension = pathinfo($client->documents, PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <!-- Display image for JPG, JPEG, PNG -->
                                        <img src="{{ $filePath }}" alt="Client Document"
                                        style="height: 100px; border: none; margin-top: 10px;">
                                        @elseif($fileExtension === 'pdf')
                                        <!-- Display PDF directly on the page in a small size -->
                                        <iframe src="{{ $filePath }}"
                                        style="height: 100px; border: none; margin-top: 10px;"></iframe>
                                        @elseif(in_array($fileExtension, ['doc', 'docx']))
                                        <!-- For DOC and DOCX, show a link to download -->
                                        <p>
                                            <a href="{{ $filePath }}" target="_blank"
                                                style="margin-top: 10px; display: inline-block;">
                                                View Document ({{ strtoupper($fileExtension) }})
                                            </a>
                                        </p>
                                        @else
                                        <p>Unsupported file type.</p>
                                        @endif
                                        @endif

                                    </div>
                                </div>
                                <button class="btn btn-primary ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Update Client
                                </button>
                            </div>
                        </form>
                        @endif

                        @if ($client->organizational_name)
                        <form action="{{ route('client.update', $client->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="organizational_info">
                                <h4>Organization</h4>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_name">Organization Name</label>
                                        <input id="organizational_name" type="text" class="form-control"
                                            placeholder="fill name" name="organizational_name"
                                            value="{{ old('organizational_name', $client->organizational_name) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_phone_number">Organization Phone
                                            Number</label>
                                        <input id="organizational_phone_number" type="text" class="form-control"
                                            placeholder="fill organizational phone number"
                                            name="organizational_phone_number"
                                            value="{{ old('organizational_phone_number', $client->organizational_phone_number) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_whatsapp_number">Organization
                                            WhatsApp Number</label>
                                        <input id="organizational_whatsapp_number" type="text" class="form-control"
                                            placeholder="fill organizational whatsapp number"
                                            name="organizational_whatsapp_number"
                                            value="{{ old('organizational_whatsapp_number', $client->organizational_whatsapp_number) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_email">Organization Email</label>
                                        <input id="organizational_email" type="email" class="form-control"
                                            placeholder="fill organizational email" name="organizational_email"
                                            value="{{ old('organizational_email', $client->organizational_email) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_address">Organizational
                                            Address</label>
                                        <input id="organizational_address" type="text" class="form-control"
                                            placeholder="fill organizational address" name="organizational_address"
                                            value="{{ old('organizational_address', $client->organizational_address) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_website">Organizational
                                            Website</label>
                                        <input id="organizational_website" type="text" class="form-control"
                                            placeholder="fill organizational website" name="organizational_website"
                                            value="{{ old('organizational_website', $client->organizational_website) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_fb_url">Organizational FB
                                            URL</label>
                                        <input id="organizational_fb_url" type="text" class="form-control"
                                            placeholder="fill organizational fb url" name="organizational_fb_url"
                                            value="{{ old('organizational_fb_url', $client->organizational_fb_url) }}">
                                    </div>
                                    <div class="form-group col-md-3">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_logo">Organizational Logo</label>
                                        <input id="organizational_logo" type="file" class="form-control"
                                            placeholder="fill organizational logo" name="organizational_logo">
                                        @if($client->organizational_logo)
                                        <img src="{{ asset('storage/' . $client->organizational_logo) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_business_card">Organizational
                                            Business Card</label>
                                        <input id="organizational_business_card" type="file" class="form-control"
                                            placeholder="fill Business Card" name="organizational_business_card">
                                        @if($client->organizational_business_card)
                                        <img src="{{ asset('storage/' . $client->organizational_business_card) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="organizational_other_documents">Others
                                            Documents</label>
                                        <input id="organizational_other_documents" type="file" class="form-control"
                                            placeholder="fill organizational other documents"
                                            name="organizational_other_documents">
                                        @if($client->organizational_other_documents)
                                        @php
                                        $filePath = asset('storage/' . $client->organizational_other_documents);
                                        $fileExtension = pathinfo($client->organizational_other_documents,
                                        PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <!-- Display image for JPG, JPEG, PNG -->
                                        <img src="{{ $filePath }}" alt="Client Document"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @elseif($fileExtension === 'pdf')
                                        <!-- Display PDF directly on the page in a small size -->
                                        <iframe src="{{ $filePath }}"
                                            style="height: 100px; border: none; margin-top: 10px;"></iframe>
                                        @elseif(in_array($fileExtension, ['doc', 'docx']))
                                        <!-- For DOC and DOCX, show a link to download -->
                                        <p>
                                            <a href="{{ $filePath }}" target="_blank"
                                                style="margin-top: 10px; display: inline-block;">
                                                View Document ({{ strtoupper($fileExtension) }})
                                            </a>
                                        </p>
                                        @else
                                        <p>Unsupported file type.</p>
                                        @endif
                                        @endif

                                    </div>
                                </div>
                                <h4 class=" mt-4">Contact Person</h4>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_name">Name</label>
                                        <input id="contact_name" type="text" class="form-control"
                                            placeholder="fill name" name="contact_name"
                                            value="{{ old('contact_name', $client->contact_name) }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_designation">Designation</label>
                                        <input id="contact_designation" type="text" class="form-control"
                                            placeholder="fill designation" name="contact_designation"
                                            value="{{ old('contact_designation', $client->contact_designation) }}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_company">Company</label>
                                        <input id="contact_company" type="text" class="form-control"
                                            placeholder="fill company" name="contact_company"
                                            value="{{ old('contact_company', $client->contact_company) }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_phone">Phone</label>
                                        <input id="contact_phone" type="text" class="form-control"
                                            placeholder="fill phone" name="contact_phone"
                                            value="{{ old('contact_phone', $client->contact_phone) }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_whatsapp">WhatsApp</label>
                                        <input id="contact_whatsapp" type="text" class="form-control"
                                            placeholder="fill whatsapp" name="contact_whatsapp"
                                            value="{{ old('contact_whatsapp', $client->contact_whatsapp) }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_email">Email</label>
                                        <input id="contact_email" type="email" class="form-control"
                                            placeholder="fill email" name="contact_email"
                                            value="{{ old('contact_email', $client->contact_email) }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_nid_number">NID Number</label>
                                        <input id="contact_nid_number" type="text" class="form-control"
                                            placeholder="fill NID Number" name="contact_nid_number"
                                            value="{{ old('contact_nid_number', $client->contact_nid_number) }}">
                                    </div>
                                    <div class="form-group col-md-3">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_business_card">Business Card</label>
                                        <input id="contact_business_card" type="file" class="form-control"
                                            placeholder="fill Business Card" name="contact_business_card">
                                        @if($client->contact_business_card)
                                        <img src="{{ asset('storage/' . $client->contact_business_card) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_nid_image">NID Image</label>
                                        <input id="contact_nid_image" type="file" class="form-control"
                                            placeholder="fill NID Image" name="contact_nid_image">
                                        @if($client->contact_nid_image)
                                        <img src="{{ asset('storage/' . $client->contact_nid_image) }}"
                                            alt="Client Passport"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="contact_other_documents">Others Documents</label>
                                        <input id="contact_other_documents" type="file" class="form-control"
                                            placeholder="fill Contact other documents" name="contact_other_documents">
                                        @if($client->contact_other_documents)
                                        @php
                                        $filePath = asset('storage/' . $client->contact_other_documents);
                                        $fileExtension = pathinfo($client->contact_other_documents, PATHINFO_EXTENSION);
                                        @endphp

                                        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <!-- Display image for JPG, JPEG, PNG -->
                                        <img src="{{ $filePath }}" alt="Client Document"
                                            style="height: 100px; border: none; margin-top: 10px;">
                                        @elseif($fileExtension === 'pdf')
                                        <!-- Display PDF directly on the page in a small size -->
                                        <iframe src="{{ $filePath }}"
                                            style="height: 100px; border: none; margin-top: 10px;"></iframe>
                                        @elseif(in_array($fileExtension, ['doc', 'docx']))
                                        <!-- For DOC and DOCX, show a link to download -->
                                        <p>
                                            <a href="{{ $filePath }}" target="_blank"
                                                style="margin-top: 10px; display: inline-block;">
                                                View Document ({{ strtoupper($fileExtension) }})
                                            </a>
                                        </p>
                                        @else
                                        <p>Unsupported file type.</p>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-primary ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Update Clients
                                </button>
                            </div>
                        </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>

</script>
@endpush
