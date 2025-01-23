@extends('layouts.default')

@section('content')
<div class="container card shadow-sm" style="max-width: 500px; margin-top: 100px;">
    <div class="fs-3 fw-bold text-center mt-5">Edit Task</div>
    <form class="p-3" method="POST" action="{{ route('task.update', $task->id) }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>    
        <div class="mb-3">
            <label for="description" class="form-label">Task Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Task Time & Date</label>
            <input type="datetime-local" name="deadline" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($task->deadline)) }}" required>
            @error('deadline')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success rounded-pill mb-4" type="submit">Update Task</button>
    </form>
</div>
@endsection
