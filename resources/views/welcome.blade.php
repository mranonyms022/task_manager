<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Task Manager</title>
  </head>
  <body>

    <div class="container">
        <div class="card">
            <div class="card-header bg-warning">
                <h5 class="card-title" style="float:left">Task Manger</h5>
                <a class="btn btn-success" href="{{url('show-all-task')}}" style="float:right">Show All</a>
            </div>
            <div class="body">
                <div class="row mt-2">
                    <form action="{{url('task-submit')}}" method="Post">
                        @csrf
                        <div class="form-group col-sm-6">
                            <input type="text" name="task" class="form-control">
                            <button class="btn btn-info">Add Task</button>
                        </div>

                    </form>

                </div>
                <table class="table m-3 table-bordered">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{$task->status=='2'?'Completed':'Pending'}}</td>
                            @if($task->status=='2')
                            <td><a href="{{url('delete-task',$task->id)}}" class="btn text-danger"><i class="fa fa-trash"></i></a></td>
                            @else
                            <td><a href="{{url('complete-task',$task->id)}}" class="btn text-success"><i class="fa fa-check"></i></a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js "></script>
    @if(Session::has('success'))
    <script>
        Swal.fire({
        title: "Good job!",
        text: "{{Session::get('success')}}",
        icon: "success"
        });
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        Swal.fire({
        title: "Good job!",
        text: "{{Session::get('error')}}",
        icon: "success"
        });
    </script>
    @endif
  </body>

</html>
