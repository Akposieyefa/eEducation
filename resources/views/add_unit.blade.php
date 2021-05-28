@extends('layouts.app')
@section('content')
       <div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                    <div class="nk-content-body">  
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <br>
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- jquery validation -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Add Unit</h3>
                                            </div>
                                                <div class="card-body">
                                                    @if($errors->any())
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(session()->has('message'))
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <div class="alert alert-success">{{ session()->get('message') }}</div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                 <form id="addUnit" method="post"  action="{{route('create-unit')}}" accept-charset="UTF-8" autocomplete="off">
                                                        @csrf
                                                        <div>
                                                            <div class="form-group mb-5">
                                                                    <label> <strong>Enter Unit Name</strong></label>
                                                                    <input type="text" class="form-control" name="unit_name" placeholder="Enter Unit Name" title="Enter Unit Name" />
                                                                    @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Add Unit</button>
                                                </form>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="container-fluid">
                                <br/><br/><br/>
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- jquery validation -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">List of Units</h3>
                                            </div>
                                        <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="datatable-init table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($units as $unit)
                                                            <tr>
                                                                <td>{{ $unit->name }}</td>
                                                                <td class="row">
                                                                    <div class="col-md-2">
                                                                        <form id="frmEdit{{ $unit->id }}" method="POST" action="{{ route('edit-unit') }}">
                                                                            @csrf 
                                                                            <input type="hidden" name="unitid" value="{{ $unit->id }}" />
                                                                            <input type="hidden" id="edit{{ $unit->id }}" name="unitname" />
                                                                            <input type="button" rel="{{ $unit->id }}" reln="{{ $unit->name }}" class="edit btn btn-sm btn-success" value="Edit" />
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <form id="frmDelete{{ $unit->id }}" method="POST" action="{{ route('delete-unit') }}">
                                                                            @csrf 
                                                                            <input type="hidden" name="unitid" value="{{ $unit->id }}" />
                                                                            <input type="submit" rel="{{ $unit->id }}" class="delete btn btn-sm btn-danger" value="Delete" />
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </div>
                        </section>
                        <!-- /.content -->
                    </div>
              </div>
       </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

<script>
    $('.delete').on("click", function (e) {
        e.preventDefault();
        var id = $(this).attr('rel');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            $('#frmDelete'+id).submit();
        });
    });

    $('.edit').on("click", function (e) {
        e.preventDefault();
         var id = $(this).attr('rel');
         var unitname = $(this).attr('reln');
        Swal.fire({
            title: 'Edit Unit',
            input: 'text',
            inputValue: unitname,
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Save Changes',
            showLoaderOnConfirm: true,
            allowOutsideClick: function allowOutsideClick() {
                return !Swal.isLoading();
            }
        }).then(function (result) {
            //alert(result.value); exit;
            if (result.value.length > 1) {
                $('#edit'+id).val(result.value);
                $('#frmEdit'+id).submit();
                //Swal.fire("Good job!", "Changes Saved!", "success");
                //location.reload();
            }
        });
        
    });
</script>

@endsection