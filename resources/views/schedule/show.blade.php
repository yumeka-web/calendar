@extends('layouts.app')

@section('title', 'Show Schedule')

@section('content')
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
                <h2> Title : {{ $schedule->title }}</h2>
                    </div>
        <div class="card-body">
            <p class="card-text">Descriptioin : {{ $schedule->description }}</p>
            <p class="fw-bold">Start Time : {{ date('M d, Y h:i A', strtotime($schedule->start_time)) }}</p>
            <p class="fw-bold">End Time : {{ date('M d, Y h:i A', strtotime($schedule->end_time)) }}</p>
           
            <form action="{{ route('schedule.update.status', $schedule->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary">Done</button>
            </form>
        </div>
    </div>
@endsection