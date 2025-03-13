@extends('layouts.app')

@section('title', 'Edit Schedule')

@section('content')
    <form action="{{ route('schedule.update', $schedule->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{ old('title', $schedule->title) }}">
            @error('title')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label fw-bold">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $schedule->start_time }}">
            @error('start_time')
                <div class="text-danger smal">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label fw-bold">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $schedule->end_time }}">
            @error('end_time')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Enter Description">{{ old('description',$schedule->description) }}</textarea>
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label fw-bold">Categories</label>
            <select name="category" id="category" class="form-control">
                <option value="" hidden>Select Category</option>
                @foreach ($categories as $category)
                    @if ($category->id === $schedule->category_id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('category')
                <div class="text-danger smal">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning px-5">Save</button>
    </form>
@endsection