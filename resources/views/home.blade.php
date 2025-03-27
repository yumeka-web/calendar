@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <style>
        .card {
            height: 400px;
        }
    </style>
    <div class="row">
        <div class="col">
            @if ($user->schedules->isNotEmpty())
                <div class="row">
                    @foreach ($user->schedules as $schedule)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                @if ($schedule->status !== 1)        
                                @if ($schedule->category_id % 4 == 1)
                                    <div class="card-header bg-primary">
                                @elseif ($schedule->category_id % 4 == 2)
                                    <div class="card-header bg-danger">
                                @elseif ($schedule->category_id % 4 == 3)
                                    <div class="card-header bg-warning">
                                @elseif ($schedule->category_id % 4 == 0)
                                        <div class="card-header bg-success">
                    
                                @endif
                                @else
                                    <div class="card-header bg-secondary">
                                @endif
                                   
                                    <div class="row">
                                        <div class="col-9">
                                            <a href="{{ route('schedule.show', $schedule->id) }}" class="text-white">
                                            <h2>Title : {{ $schedule->title }}</h2>
                                            </a>
                                        </div>
                                        <div class="col text-end">
                                            @if ($schedule->user_id == Auth::user()->id)
                                                <div class="dropdown">
                                                    <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        {{-- edit --}}
                                                        <a href="{{ route('schedule.edit', $schedule->id) }}" class="dropdown-item">
                                                            <i class="far fa-pen-to-square"></i> Edit
                                                        </a>

                                                        {{-- delete --}}
                                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-schedule-{{ $schedule->id }}">
                                                            <i class="far fa-trash-can"></i> Delete
                                                        </button>

                                                        {{-- share --}}
                                                        <button class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#share-schedule-{{ $schedule->id }}">
                                                            <i class="fa-solid fa-share"></i> Share
                                                        </button>


                                                    </div>
                                                    {{-- include modal --}}
                                                    @include('schedule.modal.delete')
                                                    @include('schedule.modal.share-schedule')
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Descriptioin : {{ $schedule->description }}</p>
                                    <p class="fw-bold">Start Time : {{ date('M d, Y h:i A', strtotime($schedule->start_time)) }}</p>
                                    <p class="fw-bold">End Time : {{ date('M d, Y h:i A', strtotime($schedule->end_time)) }}</p>

                                    <form action="{{ route('schedule.update.action', $schedule->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')

                                        @if ($schedule->action)
                                            @if ($schedule->action_status == 2)
                                                <button type="submit" class="btn btn-sm btn-dark text-white">{{ $schedule->action }}</button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-danger text-white disabled">{{ $schedule->action }}</button>
                                            @endif
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <h2>Create Schedule</h2>
                    <p class="text-muted">Start creating your schedule.</p>
                    <a href="{{ route('schedule.create')}}" class="text-decoration-none">
                        Create schedule
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
