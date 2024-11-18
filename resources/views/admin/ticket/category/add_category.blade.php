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
                            <a href="#">Add Category</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="card">
                            <div class="row">
                                <div class="card-header header-bg-1">
                                    <div class="d-flex">
                                        <h4 class="card-title">Add Category</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="" action="{{ route('category.store') }}" method="POST">
                                        @csrf
                                      
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="ticket_category">Category Name</label>
                                                <input id="ticket_category" name="ticket_category" type="text" class="form-control @error('ticket_category') is-invalid @enderror"
                                                    placeholder="Enter ticket category">
                                                    @error('ticket_category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="date">Code</label>
                                                <input id="code" name="code" type="text"
                                                    class="form-control @error('code') is-invalid @enderror"   placeholder="Enter code" >
                                                    @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="is_ticket_prefix">
                                                    Is Ticket Prefix</label>
                                                <div class="input-group">
                                                    <select id="is_ticket_prefix" name="is_ticket_prefix"
                                                        class="form-control @error('is_ticket_prefix') is-invalid @enderror">
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
                                                    </select>
                                                </div>
                                                @error('is_ticket_prefix')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="status">
                                                    Status
                                                </label>
                                                <div class="input-group">
                                                    <select id="status" name="status" class="form-control  @error('status') is-invalid @enderror">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
