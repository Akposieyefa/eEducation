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
                                                        <h2 class=" text-center text-bold" style="color:#006600;">Promote students</h2>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3" id="dispmsg"></div>
                                                </div>

                                                <form action="javascript:void(0)" method="POST" id="frmPromoteStudent">
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">Select Session <small class="text-danger">*</small></label>
                                                                <select name="session" class="form-control">
                                                                    <option value="-1"> Select Session </option>
                                                                    @foreach ($sessions as $session)
                                                                        <option value="{{ $session->id }}"> {{ $session->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">From <small class="text-danger">*</small></label>
                                                                <select name="from" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Class From </option>
                                                                    @foreach ($all_classes as $class)
                                                                        <option value="{{ $class->id }}"> {{ $class->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                                <label class="form-label">To<small class="text-danger">*</small></label>
                                                                <select name="to" class="form-control form-select" data-search="on">
                                                                    <option value="-1"> Select Class To </option>
                                                                    @foreach ($all_classes as $class)
                                                                        <option value="{{ $class->id }}"> {{ $class->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-3">
                                                            <button class="btn btn-success" id="btnPromoteStudent">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- .invoice-wrap -->
                                        </div><!-- .invoice -->
                                    </div><!-- .nk-block -->
                                <div class="nk-block">
                                    <table class="datatable-init nowrap nk-tb-list is-separate dataTable no-footer" data-auto-responsive="true" id="DataTables_Table_2" role="grid">
                                            <thead>
                                                    <tr class="nk-tb-item nk-tb-head" role="row">
                                                            {{--<th class="nk-tb-col nk-tb-col-check sorting_asc" id="checkall" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1">
                                                                <input type="checkbox"  id="selectAllDomainList" name="selectAllDomainList" value="checkall">
                                                            </th>--}}
                                                            <th class="nk-tb-col" rowspan="1" colspan="1">
                                                                <span>Admission No.</span>
                                                            </th>
                                                            <th class="nk-tb-col" rowspan="1" colspan="1">
                                                                <span>Name</span>
                                                            </th>
                                                            <th class="nk-tb-col"  rowspan="1" colspan="1">
                                                                <span>Class</span>
                                                            </th>
                                                            <th class="nk-tb-col"  rowspan="1" colspan="1">
                                                                <span>Status</span>
                                                            </th>
                                                            <th class="nk-tb-col nk-tb-col-tools" rowspan="1" colspan="1">
                                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                                <li class="mr-n1">
                                                                        <div class="dropdown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            {{-- <li><ahref="javasript:void(0)"id="btnPromoteStudent"><emclass="iconnini-shield-star"></em><span>PromoteStudents</span></a></li> --}}
                                                                                        </ul>
                                                                                </div>
                                                                        </div>
                                                                </li>
                                                                </ul>
                                                            </th>
                                                    </tr><!-- .nk-tb-item -->
                                            </thead>
                                            <tbody>
                                                    @foreach($students as $student)
                                                            <tr class="nk-tb-item odd" role="row">
                                                                {{--<td class="nk-tb-col nk-tb-col-check sorting_1">
                                                                        <input type="checkbox" name="stud_id[]" class="checkall" value="{{ $student->id }}">
                                                                </td>--}}
                                                                <td class="nk-tb-col">
                                                                        <span class="tb-sub">{{ $student->admission_no }}</span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                        <span class="tb-sub">{{ $student->fullname }}</span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                        <span class="tb-sub">{{ $student->level->name }}</span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                        <span class="tb-sub"><span class="tb-status text-success">Active</span></span>
                                                                </td>
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                                        <li class="mr-n1">
                                                                                <div class="drodown">
                                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                                            <ul class="link-list-opt no-bdr">
                                                                                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modalProfile{{ $student->id }}"><em class="icon ni ni-eye"></em><span>Profile</span></a></li>
                                                                                                    @teacher
                                                                                                            {{--<li>
                                                                                                                    <a href="javascript:void(0)" class="btnPromoteSingle" rel="{{ $student->id }}">
                                                                                                                        <em class="icon ni ni-plane"></em>
                                                                                                                        <span> Promote</span>
                                                                                                                    </a>
                                                                                                            </li>--}}
                                                                                                    @endteacher
                                                                                            </ul>
                                                                                        </div>
                                                                                </div>
                                                                        </li>
                                                                        </ul>
                                                                </td>
                                                            </tr>
                                                            <!-- Modal Content Code -->
                                                            <div class="modal fade" tabindex="-1" id="modalProfile{{ $student->id }}">
                                                                <div class="modal-dialog modal-lg modal-dialog-top"" role="document">
                                                                        <div class="modal-content">
                                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <em class="icon ni ni-cross"></em>
                                                                                </a>
                                                                                <div class="modal-header">
                                                                                        <h5 class="modal-title">{{ $student->fullname }} Profile</h5>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                        <div class="nk-block">
                                                                                            <div class="nk-data data-list">
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Full Name</span>
                                                                                                                    <span class="data-value">{{ $student->fullname }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Class</span>
                                                                                                                    <span class="data-value">{{ $student->level->name }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Gender</span>
                                                                                                                    <span class="data-value">{{ $student->gender }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item  JA'AFAR MUHAMMAD ADAM -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Date of Birth</span>
                                                                                                                    <span class="data-value">{{ date('d F, Y', strtotime($student->dob))  }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Nationality</span>
                                                                                                                    <span class="data-value">{{ $student->nationality }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">State</span>
                                                                                                                    <span class="data-value">{{ ($student->state) ? $student->state->name : '' }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Local Government Area</span>
                                                                                                                    <span class="data-value">{{ ($student->lga) ? $student->lga->name : '' }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <div class="data-item">
                                                                                                            <div class="data-col">
                                                                                                                    <span class="data-label">Date Admitted</span>
                                                                                                                    <span class="data-value">{{ ($student->date_admitted != NULL) ? date('d F, Y', strtotime($student->date_admitted)) : '' }}</span>
                                                                                                            </div>
                                                                                                    </div><!-- data-item -->
                                                                                                    <br/>
                                                                                                    <h3>Guardian Information</h3>
                                                                                                    @if($student->guardian_id != NULL)  
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Name</span>
                                                                                                                        <span class="data-value">{{ $student->guardian->fname }}</span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Email Address</span>
                                                                                                                        <span class="data-value">{{  $student->guardian->email  }}</span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Phone Number</span>
                                                                                                                        <span class="data-value">{{ $student->guardian->phone  }}</span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Gender</span>
                                                                                                                        <span class="data-value">{{  $student->guardian->gender }}</span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Occupation</span>
                                                                                                                        <span class="data-value">{{ $student->guardian->occupation }} </span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Home Address</span>
                                                                                                                        <span class="data-value">{{  $student->guardian->home_address }}</span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                            <div class="data-item">
                                                                                                                    <div class="data-col">
                                                                                                                        <span class="data-label">Office Address</span>
                                                                                                                        <span class="data-value">{{  $student->guardian->office_address }}</span>
                                                                                                                    </div>
                                                                                                            </div><!-- data-item -->
                                                                                                    @else
                                                                                                            <h4 class="text-center text-danger">No Guardian Information provided</h4>
                                                                                                    @endif
                                                                                            </div><!-- data-list -->
                                                                                        </div><!-- .nk-block -->
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                    @endforeach
                                            </tbody>
                                    </table>
                                </div><!-- .nk-block -->
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

                $(document).on('click', '#btnPromoteStudent', function(e){
                        e.preventDefault();

                        //get user input
                        var formdata = $('#frmPromoteStudent').serialize();

                        Swal.fire({
                                title: 'Please wait',
                                text: 'Processing request',
                                icon: 'info',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                        });
                        $('#dispmsg').html('<div class="alert alert-info">Processing request...</div>');
                        
                        
                        $.ajax({
                            url: "{{ route('promote-multi-student') }}",
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

                $(document).on('change', '#selectAllDomainList', function(){
                        //e.preventDefault();
                
                        var checkedStatus = $('#selectAllDomainList').is(":checked");
                        $('.checkall').each(function() {
                                $(this).prop('checked', checkedStatus);
                        });
                });

        });
    </script>

@endsection


