@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
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
                            <a href="#">Edit Category</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="card">
                            <div class="row">
                                <div class="card-header header-bg-1">
                                    <div class="d-flex">
                                        <h4 class="card-title">Update Category</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="" action="{{ route('category.update',$ticketEdit->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="ticket_category">Category Name</label>
                                                <input id="ticket_category" name="ticket_category" type="text" class="form-control"
                                                    placeholder="Enter ticket category" value="{{ $ticketEdit->ticket_category ?? '' }}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="date">Code</label>
                                                <input id="code" name="code" type="text"
                                                    class="form-control"   placeholder="Enter code"  value="{{ $ticketEdit->code ?? '' }}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="is_ticket_prefix">
                                                    Is Ticket Prefix</label>
                                                <div class="input-group">
                                                    <select id="is_ticket_prefix" name="is_ticket_prefix"
                                                        class="form-control">
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="status">
                                                    Status
                                                </label>
                                                <div class="input-group">
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
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
