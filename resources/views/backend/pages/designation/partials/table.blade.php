<div class="card-body">
    <div class="table-responsive">
        <table class="table align-middle" id="example">
            <thead class="table-secondary">
                <tr>
                    <th>Sl</th>
                    <th>Designation</th>
                    <th>Short Name</th>
                    <th>Designation Code</th>
                    <th>Status </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($designations->isNotEmpty())
                    @foreach ($designations as $key => $des)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $des->designation_name ?? '' }}</td>
                            <td>{{ $des->designation_shortname ?? '' }}</td>

                            <td>{{ $des->designation_code ?? '' }}</td>
                            <td>{{ $des->status ?? '' }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('designation.edit', $des->id) }}"
                                        class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title=""
                                        data-bs-original-title="Edit info" aria-label="Edit"><i
                                            class="fa fa-pen"></i></a>
                                    <a href="javascript:;"
                                        onclick="event.preventDefault(); confirmDelete('{{ $des->id }}');"
                                        class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title=""
                                        data-bs-original-title="Delete" aria-label="Delete"><i
                                            class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $des->id }}"
                                        action="{{ route('designation.delete', $des->id) }}"
                                        method="POST" style="display: none;">
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
