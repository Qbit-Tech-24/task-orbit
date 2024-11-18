<div class="card-body">
    <div class="table-responsive">
        <table class="table align-middle" id="example">
            <thead class="table-secondary">
                <tr>
                    <th>Sl</th>
                    <th>Logo</th>
                    <th>Company Name </th>
                    <th>Company Address </th>
                    <th>District </th>
                    <th>Contact Number </th>
                    <th>Email </th>
                    <th>Company Website </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($companies->isNotEmpty())
                    @foreach ($companies as $li)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $li->company_logo) }}" class="rounded-circle" width="44" height="44" alt="">
                            </td>
                            <td>{{ $li->company_name ?? '' }}</td>
                            <td>{{ $li->company_address ?? '' }}</td>
                            <td>{{ $li->district ?? '' }}</td>
                            <td>{{ $li->contact_no ?? '' }}</td>
                            <td>{{ $li->email ?? '' }}</td>
                            <td>{{ $li->company_website ?? '' }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('companies.edit', $li->id) }}" class="text-warning"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                        data-bs-original-title="Edit info" aria-label="Edit"><i
                                            class="fa fa-pen"></i></a>
                                    <a href="javascript:;"
                                        onclick="event.preventDefault(); confirmDelete('{{ $li->id }}');"
                                        class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="" data-bs-original-title="Delete" aria-label="Delete"><i
                                            class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $li->id }}"
                                        action="{{ route('companies.delete', $li->id) }}" method="POST"
                                        style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>
