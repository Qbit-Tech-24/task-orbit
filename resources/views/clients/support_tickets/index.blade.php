@extends('layouts.app')
@section('title', 'Open Support Ticket')
@push('custom_css')
@endpush
@section('client_content')
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
                    <a href="#">Manage Support Ticket</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-bg-1">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Support List</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Client </th>
                                        <th>Subject</th>
                                        <th>Project Name</th>
                                        <th>Department</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th style="align-center ">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($openticekts as $openticekt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $openticekt->clientname->name }}</td>
                                        <td>{{ $openticekt->subject}}</td>
                                        <td>{{ $openticekt->project_name }}</td>
                                        <td>{{ $openticekt->department }}</td>
                                        <td>
                                          {{ $openticekt->priority}}

                                        </td>
                                        <td>
                                            {{ $openticekt->status}}

                                          </td>
                                        <td>
                                            <div class="form-button-action align-items-center">
                                                <a href="{{ route('support_ticket_high.show',$openticekt->id) }}" type="button" data-bs-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="View Board" style="display: inline;">
                                                    <i class="fa fa-eye"></i>
                                                </a>


                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

