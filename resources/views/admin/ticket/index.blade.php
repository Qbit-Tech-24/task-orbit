@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Admin</h3>
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
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-primary text-white" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                                        <th>Created By </th>
                                        <th>Subject</th>
                                        <th>Project Name</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th style="align-center ">Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @foreach ($tickets as $openticekt)
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
                                                <a href="{{ route('ticket.support.show',$openticekt->id) }}" type="button" data-bs-toggle="tooltip" title=""
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
@push('script')
@endpush
