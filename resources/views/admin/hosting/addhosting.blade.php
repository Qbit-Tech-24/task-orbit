@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Hosting</h3>
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
                        <a href="#">Add Hosting</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="card-header header-bg-1">
                            <div class="d-flex">
                                <h4 class="card-title">Add Hosting</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="" action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("POST")
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="client">Client</label>
                                        <div class="input-group">
                                            <select id="client" class="form-control">
                                                <option value="">Select Client</option>
                                            </select>
                                            <a href="{{ route('client.create') }}" class="btn btn-primary">
                                                <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="domain">Domain</label>
                                        <div class="input-group">
                                            <select id="domain" class="form-control">
                                                <option value="">Select Domain</option>
                                            </select>
                                            <a href="{{ route('domain.create') }}" class="btn btn-primary">
                                                <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <h4 class="title">Server/Hosting Details</h4>
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="client">Storage Type</label>
                                        <div class="input-group">
                                        <select id="" name="" class="form-control">
                                            <option value=""selected>Select Storage Type</option>
                                            <option value="">SSD</option>
                                            <option value="">NVMe</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="client">Hosting/Server Type</label>
                                        <div class="input-group">
                                        <select id="" name="" class="form-control">
                                            <option value=""selected>Select</option>
                                            <option value="">Shared hosting</option>
                                            <option value="">Dedicated hosting</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="client">Hosting/Server Package</label>
                                        <div class="input-group">
                                        <select id="" name="" class="form-control">
                                            <option value=""selected>Select</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="space">Space</label>
                                        <input id="space" name="space" type="text" class="form-control" placeholder="space">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="ram">RAM</label>
                                        <input id="ram" name="ram" type="text" class="form-control" placeholder="RAM">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="">Bandwith/Traffic</label>
                                        <input id="" name="bandwith-traffic" type="text" class="form-control" placeholder="Bandwith/Traffic">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="">Server Location</label>
                                        <input id="server_location" name="server_location" type="text" class="form-control" placeholder="Server Location">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="state">SSL Certificate</label>
                                        <input id="ssl_certificate" name="ssl_certificate" type="text" class="form-control" placeholder="SSL Certificate">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="emailAddress" class="form-label">Email Address</label>
                                        <input id="emailAddress" name="emailAddress" type="email" class="form-control" placeholder="Primary Email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="mailingList">Mailing List</label>
                                        <input id="mailingList" name="mailingList" type="text" class="form-control" placeholder="Mailing List">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="sqlDatabase">SQL Database</label>
                                        <input id="sqlDatabase" name="sqlDatabase" type="text" class="form-control" placeholder="e.g., MySQL">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="subDomain">Sub Domain</label>
                                        <input id="subDomain" name="subDomain" type="text" class="form-control" placeholder="Enter Sub Domain">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="addonDomain">ADDon Domain</label>
                                        <input id="addonDomain" name="addonDomain" type="text" class="form-control" placeholder="Enter ADDon Domain">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="quotaEmail">Quota per Email Address</label>
                                        <input id="quotaEmail" name="quotaEmail" type="text" class="form-control" placeholder="e.g., 2GB">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="teamUsers">Team Users with Roles</label>
                                        <input id="teamUsers" name="teamUsers" type="text" class="form-control" placeholder="e.g., Admin, Developer">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="recoveryEmail">Recovery Email Address</label>
                                        <input id="recoveryEmail" name="recoveryEmail" type="text" class="form-control" placeholder="Enter Recovery Email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="currencyType" class="form-label">Currency Type</label>
                                        <select id="currencyType" class="form-control" name="currency_type">
                                            <option value="">Select Currency Type</option>
                                            <option value="usd">USD</option>
                                            <option value="bdt">BDT</option>
                                            <option value="inr">INR</option>
                                            <option value="eur">EUR</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="rate" class="form-label">Rate</label>
                                        <input id="rate" type="number" class="form-control" placeholder="Enter Rate" name="rate">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input id="amount" type="number" class="form-control" placeholder="Enter Amount" name="amount">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="date" class="form-label">Purchase Date</label>
                                        <input id="purchaseDate" type="date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                            <label for="date" class="form-label">Renewal Date</label>
                                            <input id="renewalDate" type="date" class="form-control">
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

@endpush
