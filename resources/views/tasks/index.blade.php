@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-3">Task List</h2>
            <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $index => $task )
                    <tr>
                        <td>{{ ($tasks->currentPage() - 1) * $tasks->perPage() + $index + 1 }}</td>
                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete-button">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this task?')) {
                    this.closest('form').submit();
                }
            });
        });
    });
    </script>
@endsection