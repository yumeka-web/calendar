<div class="modal fade" id="share-schedule-{{ $schedule->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h3 class="h5 modal-title text-dark">
                    <i class="fa-solid fa-share"></i> Share
                </h3>
            </div>
            <div class="modal-body text-start">
                <p>Are you sure you want to share this schedule?</p>
                <div class="mt-3">
                    <p class="mt-0 mb-0 text-muted">Title: {{ $schedule->title }}</p>
                    <p class="mt-0 mb-0 text-muted">Start Time: {{ $schedule->start_time }}</p>
                    <p class="mt-0 mb-0 text-muted">End Time: {{ $schedule->end_time }}</p>
                </div>
                <form action="{{ route('share.schedule.store', $schedule->id) }}" method="post">
                <div class="mt-3">
                    <label for="user" class="form-label fw-bold">Select the user with whom you share this
                        schedule.</label>
                    <select name="user" id="user" class="form-control" required>
                        <option value="" hidden>Select User</option>
                        @foreach ($users as $user)
                            @if ($user->id !== Auth::user()->id)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer border-0">
                    @csrf

                    <button class="btn btn-outline-warning btn-sm" type="button"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm">Share</button>
            </div>
        </form>
        </div>
    </div>
</div>
