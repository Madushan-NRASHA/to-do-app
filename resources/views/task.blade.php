<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container">
    <h1>Daily Tasks</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <input type="text" name="task" class="form-control" placeholder="Enter your task">
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <table class="table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->task }}</td>
            <td>
                @if($task->iscompleted)
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-warning">Not Completed</span>
                @endif
            </td>
            <td>
                <a href="{{ route('task.markcompleted', $task->id) }}" class="btn btn-{{ $task->iscompleted ? 'primary' : 'danger' }}">
                    Mark as {{ $task->iscompleted ? 'not completed' : 'completed' }}
                </a>
                <a href="{{ route('task.delete', $task->id) }}" class="btn btn-warning">Delete</a>
                <a href="{{ route('task.updatetview', $task->id) }}" class="btn btn-success">Update</a>


            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>

   </div>
</body>
</html>
