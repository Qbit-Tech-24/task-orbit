<!-- Modal for Updating a Team -->
@foreach ($teams as $team)
<div class="modal fade" id="editTeamModal-{{ $team->id }}" tabindex="-1" aria-labelledby="editTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editTeamModalLabel">Edit Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('teams.update', $team->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Team Name Input Field -->
                    <div class="mb-3">
                        <label for="editTeamName-{{ $team->id }}" class="form-label">Team Name</label>
                        <!-- Ensure the 'value' is populated with the team's name -->
                        <input type="text" class="form-control" id="editTeamName-{{ $team->id }}" name="name" value="{{ old('name', $team->name) }}" placeholder="Enter Team name" required>
                    </div>

                    <!-- Modal Footer with Close and Save Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
