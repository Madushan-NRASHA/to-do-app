<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updatetask</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container">

    <form action="{{ route('task.updatetasks') }}" method="post">
    @csrf
        <input type="text" name="task-name" id="" class="form-control" value="{{$taskdata->task}}"/>
        <input type="hidden" name="id" value="{{$taskdata->id}}">
        <input type="submit" value="update" class="btn btn-warning">
        &nbsp; &nbsp;<input type="button" value="cancel" class="btn btn-danger">
    </form>
   </div>
</body>
</html>