@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-3">Edit Task</h2>
            <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="mb-3">
                @csrf <!-- Attach CSRF token for server session -->
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $task->content) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
@endsection