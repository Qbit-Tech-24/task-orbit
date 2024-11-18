@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Category</h3>
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
                        <a href="#">Manage Category</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header header-bg-1">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Category List</h4>
                                <a href="{{ route('category.create') }}" class="btn btn-secondary ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Is Ticket Prefix</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Name</th>
                                            <th>Code</th>
                                            <th>Is Ticket Prefix</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										@if($ticket_cat!=null)
										@foreach($ticket_cat as $ticketCat)
                                        <tr>
                                            <td>{{ $ticketCat->ticket_category ?? '' }}</td>
                                            <td>{{ $ticketCat->code ?? '' }}</td>
											@if($ticketCat->is_ticket_prefix==1)
                                            <td>True</td>
											@else
                                            <td>False</td>
											@endif
											@if($ticketCat->status==1)
                                            <td>Active</td>
											@else
                                            <td>Deactive</td>
											@endif
                                            <td>
                                                <div class="form-button-action">
                                                    <a role="button" data-bs-toggle="tooltip" href="{{ route('category.edit',$ticketCat->id) }}"
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
													</a>
                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
										@endforeach
                                       @endif
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
