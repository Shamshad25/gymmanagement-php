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
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Member</a>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="list-group">
                <a href="/trainer" class="list-group-item list-group-item-action">Trainer</a>
                <a href="/member" class="list-group-item list-group-item-action">Member</a>
            </div>
        </div>

        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Member_Name</td>
                        <td>Member_Phone</td>
                        <td>Trainer_id</td>
                        <td>Trainer_Batch</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $person)
                    <tr>
                        <td>{{$person->id}}</td>
                        <td>{{$person->Member_Name}}</td>
                        <td>{{$person->Member_Phone}}</td>
                        <td>{{$person->myTrainer->Trainer_Name}}</td>
                        <td>{{$person->myTrainer->Trainer_Batch}}<input type="hidden" value="" /></td>
                        <td><a href="javascript:void(0)" class="btn btn-warning editBtn">Edit</a></td>
                        <td>
                            <form action="{{ route('member.destroy',$person->id)}}" method="POST">
                                @csrf
                            <input type="submit" value="Delete" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Member</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ url('member')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Member Name</label>
                <input type="text" id="Member_Name" name="Member_Name" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" id="Member_Phone" name="Member_Phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Trainer Id</label>
                {{-- <input type="text" id="Trainer_id" name="Trainer_id" class="form-control"> --}}
                <select id="Trainer_id" name="Trainer_id" class="form-control">
                    <option value="" selected disabled>Select Trainer</option>
                    @foreach ($trainer as $train)
                        <option value="{{$train->id}}">{{$train->Trainer_Name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script>
    $('.editBtn').click(function(e){

        Trainer_id = e.target.parentElement.previousElementSibling.querySelector("input[type='hidden']");\

        Member_Name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        Member_Phone = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;

      $('#Member_Name').val(Member_Name);
      $('#Member_Phone').val(Member_Phone);
      $('#Trainer_id').val(Trainer_id);

      $('#form').attr('action','member/'+id);
      $('#form').append("<input type='hidden' name='_method' value='PUT'/>");

      $('#myModal').modal('show');

    })
  </script>

</body>
</html>
