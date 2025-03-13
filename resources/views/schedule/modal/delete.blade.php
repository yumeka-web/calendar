<div class="modal fade" id="delete-schedule-{{ $schedule->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa fa-circle-exclamation"></i> Delete Schedule
                </h3>
            </div>
            <div class="modal-body text-start">
                <p>Are you sure you want to delete this schedule?</p>
                <div class="mt-3">
                    <p class="mt-1 text-muted">Title: {{ $schedule->title }}</p>
                    <p class="mt-1 text-muted">Start Time: {{ $schedule->start_time }}</p>
                    <p class="mt-1 text-muted">End Time: {{ $schedule->end_time }}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-secondary danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
