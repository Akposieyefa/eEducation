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
                                                <h3 class="card-title">School Fees Payment</h3>
                                            </div>
                                        <!-- /.card-header -->
                                                <div class="card-body">
                                                    @if (isset($error))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $error }}
                                                        </div>
                                                    @endif

                                                    @if (isset($success))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ $success }}
                                                        </div>
                                                    @endif
                                                <x-alerts.success />
                                                <div id="dispmsg" role="alert"></div>
                                                 <form id="quickForm" method="post"  action="javascript:void(0)" accept-charset="UTF-8" autocomplete="off">
                                                        @csrf
                                                        
                                                        <x-alerts.error />
                                                               <div class="form-group">
                                                                      <x-forms.label> <strong>Enter Student Registration Number </strong></x-forms.label>
                                                                      <x-forms.input type="text" name="student_id" id="student_id" placeholder="Enter Student Registration Number" title="Enter Student Registration Number" />
                                                                      @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                               </div>
                                                        </div>
                                                        <div class="card-footer">
                                                               <button type="button" id="btnProceed" class="btn btn-primary">Procced With Payment</button>
                                                        </div>
                                                </form>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
              </div>
       </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://api.payant.ng/assets/js/inline.min.js"></script>
<!--<script src="https://api.demo.payant.ng/assets/js/inline.min.js"></script>-->
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

        $(document).on('click', '#btnProceed', function(e){
            e.preventDefault();

            //get user input
            var student_id = $('#student_id').val();

            if(student_id.length < 5){
                $('#dispmsg').html('<div class="alert alert-danger">Please provide a valid student ID</div>');
                return false;
            }

            $('#dispmsg').html('<div class="alert alert-info">Please wait...</div>');
            
            $.ajax({
                url: "{{ route('pay') }}",
                type: 'POST',
                data: 'student_id='+student_id,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (msg) {
                    console.log(msg);
                    if(msg['status'] == 'success'){         
                        $('#dispmsg').html("<div class='alert alert-info' style='font-weight:700;'>Processing Payment...</div>");
                        /*139f8ef7cd9fc28a59bec057bb731ce2a92f126b*/
                        var handler = Payant.invoice({
                            "key": "139f8ef7cd9fc28a59bec057bb731ce2a92f126b",
                            "client": {
                                "first_name": msg['first_name'],
                                "last_name": " ",
                                "email": msg['email'],
                                "phone": msg['phone']
                            },
                            "due_date": msg['duedate'],
                            "fee_bearer": "client",
                            "currency": "NGN",
                            "items": [
                            {
                                "item": msg['item'],
                                "description": msg['description'],
                                "unit_cost": msg['amount'],
                                "quantity": "1"
                            }
                            ],
                            callback: function(response) {
                            console.log(response);
                            exit;
                            var paymentref = response.reference_code;
                            var c_url = 'verify'+msg['in_app_reference'];
                            $.ajax({
                                async: true,
                                url: "{{ url('"+c_url+"') }}",
                                type: 'POST',
                                data: "&student_id="+student_id+"&amountpaid="+msg['amount']+"&paymentref="+paymentref+"&in_app_ref="+msg['in_app_reference']+"&in_app_trx_id="+msg['transaction_id'],
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (res) {
                                    if(res['status'] == 'success'){
                                        $('#dispmsg').html("<div class='alert alert-success' style='color:#fff;font-weight:700;'>"+res['message']+"</div>");
                                        alert('Payment Successful');
                                        setTimeout((function(){ window.location = res['url'] }), 3000);
                                    }else{
                                        $('#dispmsg').html("<div class='alert alert-danger'>"+res['message']+"</div>");
                                    }
                                },
                                error: function(x,e) {            
                                    alert(formatErrorMessage(x, e));
                                    $('#dispmsg').html("<div class='alert alert-danger'>"+formatErrorMessage(x, e)+"</div>");
                                }
                            })
                            },
                            onClose: function() {
                            console.log('Window Closed.');
                            alert('WIndow Closed by User');
                            }
                        });
                        handler.openIframe();

                    }else {
                        $('#dispmsg').html('<div class="alert alert-danger">'+msg['message']+'</div>');
                    }
                },
                error: function(x,e) {
                    $('#dispmsg').html('<div class="alert alert-danger">'+formatErrorMessage(x, e)+'</div>');
                }
            });
        });

    });
</script>

@endsection