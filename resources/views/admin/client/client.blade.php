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
                            <h4 class="card-title">Manage Clients</h4>
                            <a href="{{route('client.create')}}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Add Clients
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Person/Organization</label>
                        </div>
                        <div class="personal_info">
                            <div class="table-responsive">
                                <table id="add-row-personal" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th style="text-align: center;">Designation</th>
                                            <th style="text-align: center;">Client Phone</th>
                                            <th style="text-align: center;">Company Phone</th>
                                            <th style="text-align: center;">Company Email</th>
                                            <th style="text-align: center;">Company Website</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Client</th>
                                            <th style="text-align: center;">Designation</th>
                                            <th style="text-align: center;">Client Phone</th>
                                            <th style="text-align: center;">Company Phone</th>
                                            <th style="text-align: center;">Company Email</th>
                                            <th style="text-align: center;">Company Website</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($clients as $client)
                                        @if($client->client_name)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $client->client_passport_image) }}"
                                                    alt="Company Logo"
                                                    style="width: 50px; height: 50px; object-fit: cover; margin-right:10px;" />
                                                {{ $client->client_name ?? $client->organizational_name }}
                                            </td>
                                            <td style="text-align: center;">{{ $client->client_designation}}</td>
                                            <td style="text-align: center;">{{ $client->client_phone}}</td>
                                            <td style="text-align: center;">
                                                {{ $client->company_phone ?? $client->organizational_phone_number }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $client->company_email ?? $client->organizational_email }}</td>
                                            <td style="text-align: center;">
                                                {{ $client->company_website ?? $client->organizational_website }}</td>
                                            <td style="text-align: center;">
                                                <div class="form-button-action">
                                                    <a href="{{ route('client.edit', $client->id) }}"
                                                        data-bs-toggle="tooltip" title="Edit Client"
                                                        class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('client.destroy', $client->id) }}"
                                                        method="POST" class="delete-form"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-link btn-danger delete-client"
                                                            data-original-title="Remove" data-bs-toggle="tooltip"
                                                            data-id="{{ $client->id }}" title="Delete Client">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="organizational_info">
                            <div class="table-responsive">
                                <table id="add-row-organizational" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Organization</th>
                                            <th style="text-align: center;">Contact person</th>
                                            <th style="text-align: center;">Organization Phone</th>
                                            <th style="text-align: center;">Organization Email</th>
                                            <th style="text-align: center;">Organization Website</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Organization</th>
                                            <th style="text-align: center;">Contact person</th>
                                            <th style="text-align: center;">Organization Phone</th>
                                            <th style="text-align: center;">Organization Email</th>
                                            <th style="text-align: center;">Organization Website</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($clients as $client)
                                        @if($client->organizational_name)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $client->organizational_logo) }}"
                                                    alt="Company Logo"
                                                    style="width: 50px; height: 50px; object-fit: cover; margin-right:10px;" />
                                                {{ $client->client_name ?? $client->organizational_name }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $client->client_name ?? $client->contact_name }} <br>
                                                {{ $client->client_phone ?? $client->contact_phone }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $client->company_phone ?? $client->organizational_phone_number }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $client->company_email ?? $client->organizational_email }}</td>
                                            <td style="text-align: center;">
                                                {{ $client->company_website ?? $client->organizational_website }}</td>
                                            <td style="text-align: center;">
                                                <div class="form-button-action">
                                                    <a href="{{ route('client.edit', $client->id) }}"
                                                        data-bs-toggle="tooltip" title="Edit Client"
                                                        class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('client.destroy', $client->id) }}"
                                                        method="POST" class="delete-form"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-link btn-danger delete-client"
                                                            data-original-title="Remove" data-bs-toggle="tooltip"
                                                            data-id="{{ $client->id }}" title="Delete Organization">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
    $(document).ready(function () {
        $('#add-row-personal').DataTable({
            paging: true,
            searching: true,
            responsive: true
        });

        $('#add-row-organizational').DataTable({
            paging: true,
            searching: true,
            responsive: true
        });

        // Delete confirmation with SweetAlert
        $('.delete-client').on('click', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var clientId = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });


    $(document).ready(function () {
        // Use event delegation to attach the click event to the parent element
        $(document).on('click', '.delete-client', function () {
            var form = $(this).closest('form');
            deleteClient(form);
        });
    });

    function deleteClient(form) {
        swal({
            title: "Are you sure?",
            text: "Are you sure that you want to delete this client?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "Delete",
                    value: true,
                    visible: true,
                    className: "btn-danger",
                    closeModal: true // Close modal on confirmation
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                form.submit(); // Submit the form if confirmed
                swal("Deleted!", "The client has been deleted!", "success");
            }
        });
    }

</script>
@endpush
