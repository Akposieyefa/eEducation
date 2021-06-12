@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="invoice">
                                        <div class="invoice-wrap">
                                            <div class="invoice-head mt-3 mb-3 row">
                                                <div class="invoice-contact col-12">
                                                    <h2 class=" text-center text-bold" style="color:#006600;">View Payslip</h2>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 offset-3">
                                                    <div id="dispmsg"></div>
                                                </div>
                                            </div>
                                            <form action="javascript:void(0)" method="POST" name="frmPayslip" id="frmPayslip">
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                            <label class="form-label">Select Year <small class="text-danger">*</small></label>
                                                            <select name="year" class="form-control">
                                                                <option value="-1"> Select Year </option>
                                                            </select>
                                                            @error('session') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                            <label class="form-label">Select Month <small class="text-danger">*</small></label>
                                                            <select name="month" class="form-control">
                                                                <option value="-1"> Select Month </option>
                                                            </select>
                                                            @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                        <button class="btn btn-success" id="btnPayslip">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                             <div class="form-group row mt-5 pt-5">
                                                <div class="col-md-12 text-center" id="displaypayslip">
                                                   
                                                </div>
                                            </div>
                                        </div><!-- .invoice-wrap -->
                                    </div><!-- .invoice -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

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

                        $(document).on('click', '#btnPayslip', function(e){
                            e.preventDefault();

                            //get user input
                            var formdata = $('#frmPayslip').serialize();

                            Swal.fire({
                                title: 'Please wait',
                                text: 'Processing request',
                                icon: 'info',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                             
                            $('#dispmsg').html('<div class="alert alert-info">Processing request...</div>');
                        
                            
                            $.ajax({
                                url: "{{ route('view-payslip') }}",
                                type: 'POST',
                                data: formdata,
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (msg) {
                                    //console.log(msg);
                                    if(msg['status'] == 'success'){         
                                        $('#dispaypayslip').html("<img src='"+msg['message']+"' style='width:100%; height;auto;'  />");
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
