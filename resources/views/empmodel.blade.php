<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">




</head>
<body>

      <!--add Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Modal</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
        <div class="modal-body">

                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="fname" class="form-control" placeholder="Enter First Name" >
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" >
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control" placeholder="Enter Address" >
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" >
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Data</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  {{-- end add modal --}}



    <!--edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/employee" method="POST" id="editform">
                @csrf
                {{ method_field('PUT') }}
            <div class="modal-body">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name" >
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name" >
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" >
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" >
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
            </div>
        </div>
    </div>

        {{-- end edit modal --}}



            <!--delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/employee" method="POST" id="deleteform">
                @csrf
                {{ method_field('DELETE') }}
            <div class="modal-body">

                <input type="hidden" name="_method" value="DELETE">
                <p>Are you sure?..You want to Delete Data</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes! Delete Data</button>
            </div>
        </form>
            </div>
        </div>
    </div>

        {{-- end delete modal --}}



    <div class="container">
        <h1>Laravel CRUD: With bootsrap modal[popup modal]</h1>

        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif

        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>

        @endif

        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Data
    </button>

    <table id="mytable" class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Address</td>
                <td>Mobile Number</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($emps as $empdata)
        <tr>
            <td>{{ $empdata->id }}</td>
            <td>{{ $empdata->fname }}</td>
            <td>{{ $empdata->lname }}</td>
            <td>{{ $empdata->address }}</td>
            <td>{{ $empdata->mobile }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: none;color:black;">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Show</a></li>
                      <li><a class="dropdown-item edit" href="#">Edit</a></li>
                      <li><a class="dropdown-item delete" href="#">Delete</a></li>
                    </ul>
                  </div>
                {{-- <a href="" class="btn btn-info" >Show</a>
                <a href="#" class="btn btn-primary edit" >Edit</a>
                <a href="" class="btn btn-danger" >Delete</a> --}}
            </td>
        </tr>
            @endforeach

        </tbody>
        <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Address</td>
                <td>Mobile Number</td>
                <td>Action</td>
            </tr>
        </thead>
      </table>

    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
        var table = $('#mytable').DataTable();

        //start Edit Record
        table.on('click','.edit',function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $("#fname").val(data[1]);
            $("#lname").val(data[2]);
            $("#address").val(data[3]);
            $("#mobile").val(data[4]);

            $('#editform').attr('action','employee/'+data[0]);
            $('#editModal').modal('show');
        });

        //end edit record

        //delete Record
        table.on('click','.delete',function(){
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $("#fname").val(data[1]);
            $("#lname").val(data[2]);
            $("#address").val(data[3]);
            $("#mobile").val(data[4]);

            $('#deleteform').attr('action','employee/'+data[0]);
            $('#deleteModal').modal('show');
        });

        //delete record
    });
    </script>

</body>
</html>
