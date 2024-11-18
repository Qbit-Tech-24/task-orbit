@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner ms-lg-0">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Premium Bootstrap 5 Admin Dashboard</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Todays Income</b></h6>
                                <p class="text-muted">All Customs Value</p>
                            </div>
                            <h4 class="text-info fw-bold">$170</h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
                            <p class="text-muted mb-0">75%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>Total Revenue</b></h6>
                                <p class="text-muted">All Customs Value</p>
                            </div>
                            <h4 class="text-success fw-bold">$120</h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
                            <p class="text-muted mb-0">25%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>New Orders</b></h6>
                                <p class="text-muted">Fresh Order Amount</p>
                            </div>
                            <h4 class="text-danger fw-bold">15</h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
                            <p class="text-muted mb-0">50%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6><b>New Users</b></h6>
                                <p class="text-muted">Joined New User</p>
                            </div>
                            <h4 class="text-secondary fw-bold">12</h4>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0">Change</p>
                            <p class="text-muted mb-0">25%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">Users Geolocation</h4>
                            <div class="card-tools">
                                <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                                <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
                                <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                        <p class="card-category">
                        Map of the distribution of users around the world</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{asset('admin')}}/img/flags/id.png" alt="indonesia">
                                                    </div>
                                                </td>
                                                <td>Indonesia</td>
                                                <td class="text-end">
                                                    2.320
                                                </td>
                                                <td class="text-end">
                                                    42.18%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{asset('admin')}}/img/flags/us.png" alt="united states">
                                                    </div>
                                                </td>
                                                <td>USA</td>
                                                <td class="text-end">
                                                    240
                                                </td>
                                                <td class="text-end">
                                                    4.36%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{asset('admin')}}/img/flags/au.png" alt="australia">
                                                    </div>
                                                </td>
                                                <td>Australia</td>
                                                <td class="text-end">
                                                    119
                                                </td>
                                                <td class="text-end">
                                                    2.16%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{asset('admin')}}/img/flags/ru.png" alt="russia">
                                                    </div>
                                                </td>
                                                <td>Russia</td>
                                                <td class="text-end">
                                                    1.081
                                                </td>
                                                <td class="text-end">
                                                    19.65%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{asset('admin')}}/img/flags/cn.png" alt="china">
                                                    </div>
                                                </td>
                                                <td>China</td>
                                                <td class="text-end">
                                                    1.100
                                                </td>
                                                <td class="text-end">
                                                    20%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="{{asset('admin')}}/img/flags/br.png" alt="brazil">
                                                    </div>
                                                </td>
                                                <td>Brasil</td>
                                                <td class="text-end">
                                                    640
                                                </td>
                                                <td class="text-end">
                                                    11.63%
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mapcontainer">
                                    <div id="world-map" class="w-100" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
