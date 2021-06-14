@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @admin
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
                                                <form action="javascript:void(0)" method="POST" name="frmSavePayslip" id="frmSavePayslip">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">Select Staff <small class="text-danger">*</small></label>
                                                                <select name="staff" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Staff </option>
                                                                    @foreach ($staff as $st)
                                                                        <option value="{{ $st->id }}"> {{ $st->fullname.' ('.$st->teacher_id.')' }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">Select Year <small class="text-danger">*</small></label>
                                                                <select name="year" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Year </option>
                                                                    @foreach ($year as $yr)
                                                                        <option value="{{ $yr }}"> {{ $yr }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">Select Month <small class="text-danger">*</small></label>
                                                                <select name="month" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Month </option>
                                                                    @foreach ($month as $mth)
                                                                        <option value="{{ $mth }}"> {{ $mth }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">Upload Payslip <small class="text-danger">*</small> <small class="text-danger">(.jpg, .jpeg, .png allowed )</small></label>
                                                                <input type="file" name="fileupload" class="form-control" id="filePayslip">
                                                                <input type="hidden" name="payslip" class="form-control" id="filepath">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-1 pt-1">
                                                        <div class="col-md-12 text-center" id="displaypayslip"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                            <button class="btn btn-success" id="btnSavePayslip">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                            </div><!-- .invoice-wrap -->
                                        </div><!-- .invoice -->
                                    </div><!-- .nk-block -->
                                @endadmin

                                @teacher
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
                                                                <select name="year" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Year </option>
                                                                    @foreach ($year as $yr)
                                                                        <option value="{{ $yr }}"> {{ $yr }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">Select Month <small class="text-danger">*</small></label>
                                                                <select name="month" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Month </option>
                                                                    @foreach ($month as $mth)
                                                                        <option value="{{ $mth }}"> {{ $mth }} </option>
                                                                    @endforeach
                                                                </select>
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
                                @endteacher
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

                    if($('#btnSavePayslip')){
                        $('#btnSavePayslip').hide();
                    }                    

                    $(document).ready(function(){

                        $(document).on('click', '#btnSavePayslip', function(e){
                            e.preventDefault();

                            //get user input
                            var formdata = $('#frmSavePayslip').serialize();

                            Swal.fire({
                                title: 'Please wait',
                                text: 'Processing request',
                                icon: 'info',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                            });
                             
                            $('#dispmsg').html('<div class="alert alert-info">Processing request...</div>');
                        
                            
                            $.ajax({
                                url: "{{ route('upload-payslip') }}",
                                type: 'POST',
                                data: formdata,
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (msg) {
                                    //console.log(msg);
                                    if(msg['status'] == 'success'){         
                                       $('#dispmsg').html('<div class="alert alert-success">'+msg['message']+'</div>');
                                        Swal.fire({
                                            title: 'Good Job!',
                                            text: ''+msg['message'],
                                            icon: 'success',
                                        });
                                        location.reload();
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

                        const url = "https://api.cloudinary.com/v1_1/arcane159/image/upload";

                        const picture_upload = document.getElementById("filePayslip");

                        picture_upload.addEventListener("change", (e) => {
                            e.preventDefault();
                            
                            const files = document.querySelector("#filePayslip").files;
                            const formData = new FormData();

                            for (let i = 0; i < files.length; i++) {
                                let file = files[i];
                                formData.append("file", file);
                                formData.append("upload_preset", "ho0zep1z");
                                document.getElementById("displaypayslip").innerHTML = '<div class="alert alert-info text-center col-6 offset-3">Uploading Image...</div>';
                                fetch(url, {
                                    method: "POST",
                                    body: formData,
                                })
                                .then((response) => {
                                    return response.text();
                                })
                                .then((data) => {
                                    var obj = JSON.parse(data);
                                    if(obj.error){
                                        document.getElementById("displaypayslip").innerHTML = '<div class="alert alert-danger text-center col-6 offset-3">'+obj.error.message+'</div>';
                                    }else{
                                        document.getElementById("filepath").value = obj.secure_url;
                                        document.getElementById("displaypayslip").innerHTML = '<img src="'+obj.secure_url+'" style="width:200px; height:auto;" />';
                                        $('#btnSavePayslip').show();
                                        //document.getElementById("displaypayslip").innerHTML = '<div class="alert alert-success">File Uploaded Successful</div>';
                                    }
                                });
                            }
                        });

                    });
                </script>
@endsection
