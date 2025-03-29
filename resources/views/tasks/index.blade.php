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
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $index => $task )
                    <tr>
                        <td>{{ ($tasks->currentPage() - 1) * $tasks->perPage() + $index + 1 }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->content }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
@endsection