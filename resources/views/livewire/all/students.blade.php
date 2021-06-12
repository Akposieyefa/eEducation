<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                            <div class="nk-block">
                                   @livewire('modals.student')
                                   <div class="row mb-3" style="border:0px solid red;">
                                          <div class="col-md-3 offset-8">
                                          <input type="search" wire:model="searchString" class="form-control form-control-sm" placeholder="Type in to Search" />
                                          </div>
                                          <div class="col-md-1"></div>
                                   </div>

                                   <div class="mb-3 nk-tb-list is-separate">
                                          <div class="nk-tb-item nk-tb-head">
                                                 <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                               <input type="checkbox" class="custom-control" wire:model="selectAll">
                                                        </div>
                                                 </div>
                                                 <div class="nk-tb-col"><span class="sub-text">Admission No.</span></div>
                                                 <div class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></div>
                                                 <!--<div class="nk-tb-col tb-col-mb"><span class="sub-text">Gender</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">DOB</span></div>
                                                 <div class="nk-tb-col tb-col-lg"><span class="sub-text">State</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">LGA</span></div>-->
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Class</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                                 <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                               <li>
                                                                      <div class="drodown">
                                                                             <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown">
                                                                                    <em class="icon ni ni-more-h"></em>
                                                                             </a>
                                                                             <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                           <!--<li><a href="#" onclick="return confirm('Are you sure you want to delete this...?') || even.stopImmediatePropagation()" wire:click="deleteRecords()" ><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a></li>-->
                                                                                           <li><a href="#" wire:click="exportBulkStudents()"><em class="icon ni ni-shield-star"></em><span>Download</span></a></li>
                                                                                           <li><a href="#" onclick="return confirm('Are you sure you want to promote this students...?') || even.stopImmediatePropagation()" wire:click="promoteMultiStudents()"><em class="icon ni ni-shield-star"></em><span>Promote Students</span></a></li>
                                                                                           <li><a href="#" wire:click="exportBulkStudents()"><em class="icon ni ni-shield-star"></em><span>Promote Students</span></a></li>

                                                                                    </ul>
                                                                             </div>
                                                                      </div>
                                                               </li>
                                                        </ul>
                                                 </div>
                                          </div><!-- .nk-tb-item -->
                                          @foreach($students as $student)
                                                 <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                               <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                      <input type="checkbox" class="custom-control" wire:model="selectedStudents" value="{{ $student->id }}">
                                                                      <label class="custom-control"></label>
                                                               </div>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                               <!--<a href="#">-->
                                                                      <div class="user-card">
                                                                             <div class="user-info">
                                                                                    <span>{{ $student->admission_no }}</span>
                                                                             </div>
                                                                      </div>
                                                               <!--</a>-->
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                               <div class="user-card">
                                                                      <div class="user-info">
                                                                             <span class="tb-lead">{{ $student->fullname }} <span class="ml-1 dot dot-success d-md-none"></span></span>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                        <!--<div class="nk-tb-col tb-col-mb">
                                                               <span class="tb-amount">{{ "" /*$student->gender*/ }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                               <span>{{ "" /*$student->dob*/ }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                               <span>{{ "" /*$student->state->name*/ }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                               <span>{{ ""/*$student->lga->name*/ }}</span>
                                                        </div>-->
                                                        <div class="nk-tb-col tb-col-lg">
                                                        <span>{{ $student->level->name }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                               <span class="tb-status text-success">Active</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                               <ul class="nk-tb-actions gx-1">
                                                                      <li class="nk-tb-action-hidden">
                                                                             <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                                                    <em class="icon ni ni-user-cross-fill"></em>
                                                                             </a>
                                                                      </li>
                                                                      <li>
                                                                             <div class="drodown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                           <ul class="link-list-opt no-bdr">
                                                                                                  <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modalProfile{{ $student->id }}"><em class="icon ni ni-eye"></em><span>Profile</span></a></li>
                                                                                                  <li>
                                                                                                         <a href="#" wire:click="editStudent({{ $student->id }})">
                                                                                                         <em class="icon ni ni-edit"></em><span>Edit </span></a>
                                                                                                  </li>
                                                                                                  @teacher
                                                                                                         <li>
                                                                                                                <a href="#"
                                                                                                                       onclick="return confirm('Are you sure you want to promote this student?') ||
                                                                                                                       even.stopImmediatePropagation()" wire:click="promoteStudent({{ $student->id }})">
                                                                                                                       <em class="icon ni ni-plane"></em>
                                                                                                                       <span> Promote</span>
                                                                                                                </a>
                                                                                                         </li>
                                                                                                  @endteacher
                                                                                                  @admin
                                                                                                         <li>
                                                                                                                <a href="javascript:void(0)" class="text-danger"
                                                                                                                       onclick="return confirm('Are you sure you want to delete?') ? @this.deleteSingleRecord({{$student->id}}) : false">
                                                                                                                       <em class="icon ni ni-trash"></em>
                                                                                                                       Delete
                                                                                                                </a>
                                                                                                         </li>
                                                                                                  @endadmin
                                                                                           </ul>
                                                                                    </div>
                                                                             </div>
                                                                      </li>
                                                               </ul>
                                                        </div>
                                                 </div><!-- .nk-tb-item -->
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
                                   </div><!-- .nk-tb-list -->
                                   {{ $students->links() }}
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

        $(document).on('click', '#btnSaveChanges', function(e){
            e.preventDefault();

            //get user input
            var formdata = $('#frmTeacher').serialize();

           Swal.fire({
                title: 'Please wait',
                text: 'Processing request',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
            });
            $('#dispmsg').html('<div class="alert alert-info">Processing request...</div>');
           
            
            $.ajax({
                url: "{{ route('add-staff-profile') }}",
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


