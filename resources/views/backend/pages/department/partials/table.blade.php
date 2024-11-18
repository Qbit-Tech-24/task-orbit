<div class="card-body">
    <div class="table-responsive">
        <table class="table align-middle" id="example">
            <thead class="table-secondary">
                <tr>
                    <th>Sl</th>
                    <th>Company Name</th>
                    <th>Depertment Name</th>
                    <th>Status </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($departments->isNotEmpty())
                    @foreach ($departments as $key => $li)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $li->company_name ?? '' }}</td>
                            <td>{{ $li->deptName ?? '' }}</td>
                            <td>{{ $li->status ?? '' }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="{{ route('department.edit', $li->id) }}" class="text-warning"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                        data-bs-original-title="Edit info" aria-label="Edit"><i
                                            class="fa fa-pen"></i></a>
                                    <a href="javascript:;"
                                        onclick="event.preventDefault(); confirmDelete('{{ $li->id }}');"
                                        class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="" data-bs-original-title="Delete" aria-label="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $li->id }}"
                                        action="{{ route('departments.delete', $li->id) }}" method="POST"
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
