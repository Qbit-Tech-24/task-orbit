@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Domain</h3>
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
                        <a href="#">Add Domain</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="card-header header-bg-1">
                            <div class="d-flex">
                                <h4 class="card-title">Add Domain</h4>
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
                                            <select id="client_id" name="client_id" class="form-control">
                                                <option value=""selected>Select Client</option>
                                                @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{$client->client_name ?? $client->organizational_name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{route('client.create')}}" class="btn btn-primary">
                                                <i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="domain">Domain Name</label>
                                        <input id="domain_name" name="domain_name" type="text" class="form-control" placeholder="Enter Domain Name">

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="date">Purchase Date</label>
                                        <input id="purchaseDate" name="purchase_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="box border p-3 rounded mt-4">
                                    <div class="row">
                                        <div class="d-flex">
                                            <h4 class="title">Registrant Contact</h4>
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="firstname">First Name</label>
                                            <input id="reg_firstname" name="reg_firstname" type="text" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="lastname">Last Name</label>
                                            <input id="reg_lastname" name="reg_lastname" type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="city">City</label>
                                            <input id="reg_city" name="reg_city" type="text" class="form-control" placeholder="Enter city">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="state">State</label>
                                            <input id="reg_state" name="reg_state" type="text" class="form-control" placeholder="Enter State">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="zipcode">Zip Code</label>
                                            <input id="reg_zipcode" name="reg_zipcode" type="text" class="form-control" placeholder="Enter Zip code">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="country">Country</label>
                                            <input id="reg_country" name="reg_country" type="text" class="form-control" placeholder="Enter Country">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" id="" name="reg_address" rows="2" placeholder="Enter address here"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="box border p-3 rounded mt-4">
                                    <div class="row">
                                        <div class="d-flex">
                                            <h4 class="title">Supporting Documents</h4>
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="personName">Name</label>
                                            <input id="personName" name="person_name" type="text" class="form-control" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="phone">Phone Number</label>
                                            <input id="phone" name="phone" type="text" class="form-control" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label" for="">Mailing Address</label>
                                            <input id="" name="mailing_address" type="text" class="form-control" placeholder="Enter Mailing Address">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label" for="">Nid Number</label>
                                            <input id="" name="nid_number" type="text" class="form-control" placeholder="Enter Nid Number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="image" class="form-label">Person Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <img id="img_preview" alt="Image Preview" width="100" class="mb-2 d-none mt-2">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="image" class="form-label">Nid Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <img id="img_preview" alt="Image Preview" width="100" class="mb-2 d-none mt-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="currencyType">Currency Type</label>
                                        <select id="currencyType" class="form-control" name="currency_type">
                                            <option value="">Select Currency Type</option>
                                            <option value="usd">USD</option>
                                            <option value="bdt">BDT</option>
                                            <option value="inr">INR</option>
                                            <option value="eur">EUR</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="rate">Rate</label>
                                        <input id="rate"  type="number" class="form-control" placeholder="Enter Rate" name="rate">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="amount">Amount</label>
                                        <input id="amount" type="number" class="form-control" placeholder="Enter Amount" name="amount">
                                    </div>

                                    <div class="form-group col-md-3">
                                            <label for="date">Renewal Date</label>
                                            <input id="renewal_date" name="renewal_date" type="date" class="form-control">
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
