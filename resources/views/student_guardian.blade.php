@extends('layouts.app')
@section('content')
       <div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                    <div class="nk-content-body">  
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid"><br>
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- jquery validation -->
                                        <div class="card card-primar">
                                            <div class="card-header">
                                                <h3 class="card-title">Guardian Information</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="dispmsg" role="alert"></div>
                                                <form id="frmGuardian" method="post"  action="javascript:void(0)" accept-charset="UTF-8" autocomplete="off">
                                                        @csrf
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                        <label class="form-label">First Name <small class="text-danger">*</small></label>
                                                                        <input type="text" name="fname" id="fname" class="form-control" value="{{ $guardian->fname }}" />
                                                                        @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label class="form-label">Other Names</label>
                                                                        <input type="text" name="mname" id="mname" class="form-control" value="{{ $guardian->mname }}" />
                                                                        @error('mname') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label class="form-label">Last Name <small class="text-danger">*</small></label>
                                                                        <input type="text" name="lname" id="lname" class="form-control" value="{{ $guardian->lname }}" />
                                                                        @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                        <label class="form-label">Email Address <small class="text-danger">*</small></label>
                                                                        <input type="email" name="email" id="email" class="form-control" value="{{ $guardian->email }}" />
                                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label class="form-label">Phone Number <small class="text-danger">*</small></label>
                                                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $guardian->phone }}" />
                                                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <label class="form-label mr-5">Gender <small class="text-danger">*</small></label>
                                                                        <br/>
                                                                        <div class="custom-control custom-control-lg custom-radio mr-5 ml-3">
                                                                            <input type="radio" id="male" name="gender"  value="Male" {{ ($guardian->gender == "Male") ? "checked" : "" }} class="custom-control-input">
                                                                            <label class="custom-control-label" for="male">Male</label>
                                                                        </div>
                                                                        <div class="custom-control custom-control-lg custom-radio">
                                                                            <input type="radio" id="female" name="gender"  value="Female" {{ ($guardian->gender == "Female") ? "checked" : "" }} class="custom-control-input">
                                                                            <label class="custom-control-label" for="female">Female</label>
                                                                        </div>
                                                                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                        <label class="form-label">Occupation <small class="text-danger">*</small></label>
                                                                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $guardian->occupation }}" />
                                                                        @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                        <label class="form-label">Home Address <small class="text-danger">*</small></label>
                                                                        <textarea  name="home_address" id="home_address" class="form-control">{{ $guardian->home_address }}</textarea>
                                                                        @error('home_address') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <label class="form-label">Office Address <small class="text-danger">*</small></label>
                                                                        <textarea  name="office_address" id="office_address" class="form-control">{{ $guardian->office_address }}</textarea>
                                                                        @error('office_address') <span class="text-danger">{{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        <div class="card-foote">
                                                            <button type="button" id="btnSaveChanges" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div><!-- .row -->

                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
              </div>
       </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    function formatErrorMessage(jqXHR, exception) 
    {
        if (jqXHR.status === 0) {
            return ('Not connected.\nPlease verify your network connection.');
        } else if (jqXHR.status == 404) {
            return ('The requested page not found. [404]');
        } else if (jqXHR.status == 500) {
            return ('Internal Server Error [500].');
        } else if (exception === 'parsererror') {
            return ('Requested JSON parse failed.');
        } else if (exception === 'timeout') {
            return ('Time out error.');
        } else if (exception === 'abort') {
            return ('Ajax request aborted.');
        } else {
            return ('Uncaught Error.\n' + jqXHR.responseText);
        }
    }

    $(document).ready(function(){

        $(document).on('click', '#btnSaveChanges', function(e){
            e.preventDefault();

            //get user input
            var formdata = $('#frmGuardian').serialize();

           Swal.fire({
                title: 'Please wait',
                text: 'Processing request',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
            });
            $('#dispmsg').html('<div class="alert alert-info">Processing request...</div>');
           
            
            $.ajax({
                url: "{{ route('add-guardian') }}",
                type: 'POST',
                data: formdata,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (msg) {
                    //console.log(msg);
                    if(msg['status'] == 'success'){         
                        $('#dispmsg').html("<div class='alert alert-success' style='font-weight:700;'>"+msg['message']+"</div>");
                         Swal.fire({
                            title: 'Good Job!',
                            text: ''+msg['message'],
                            icon: 'success',
                        });
                    }else {
                        $('#dispmsg').html('<div class="alert alert-danger">'+msg['message']+'</div>');
                         Swal.fire({
                            title: 'Error',
                            text: ''+msg['message'],
                            icon: 'error',
                        });
                    }
                },
                error: function(x,e) {
                    $('#dispmsg').html('<div class="alert alert-danger">'+formatErrorMessage(x, e)+'</div>');
                    Swal.fire({
                        title: 'Error',
                        text: ''+ formatErrorMessage(x, e),
                        icon: 'error',
                    });
                }
            });
        });

    });
</script>

@endsection