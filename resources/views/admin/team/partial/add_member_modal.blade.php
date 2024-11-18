<!-- Modal for Adding a Member -->
@foreach ($teams as $team)
    <div class="modal fade" id="memberModal-{{ $team->id }}" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="memberModalLabel">Assign member to {{ $team->name }} Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{ route('teams.assignMember', $team->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- Dropdown for selecting multiple employees -->
                                    <select class="form-select multiple-select-field" name="employee_ids[]" multiple>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
