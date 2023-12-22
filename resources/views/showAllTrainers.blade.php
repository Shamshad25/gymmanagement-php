<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Super Gym</h1>
  <div class="float-right mr-4">
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Trainer</a>
  </div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Training Name</td>
                <td>Trainer Batch</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainer as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->Trainer_Name}}</td>
                <td>{{$person->Trainer_Batch}}</td>
                <td><a href="" class="btn btn-warning">Edit</a></td>
                <td><a href="" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Trainer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="trainer" method="POST">\
            @csrf
            <div class="form-group">
                <label for="">Trainer Name</label>
                <input type="text" id="Trainer_Name" name="Trainer_Name" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Trainer Batch</label>
                <input type="text" id="Trainer_Batch" name="Trainer_Batch" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
