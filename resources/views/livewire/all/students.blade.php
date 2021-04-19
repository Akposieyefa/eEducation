<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                            <div class="nk-block">
                                   @livewire('modals.student')
                                   <div class="mb-3 nk-tb-list is-separate">
                                          <div class="nk-tb-item nk-tb-head">
                                                 <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                               <input type="checkbox" class="custom-control" wire:model="selectAll">
                                                        </div>
                                                 </div>
                                                 <div class="nk-tb-col"><span class="sub-text">Student ID</span></div>
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
                                                                                                  <li><a href="#"><em class="icon ni ni-eye"></em><span>Profile</span></a></li>
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
                                                                                                  <!--<li><button onclick="return confirm('Are you sure you want to delete this...?') ||  even.stopImmediatePropagation()" wire:click="deleteSingleRecord({{ $student->id }})"><em class="icon ni ni-trash"></em><span>Delete</span></button></li>-->
                                                                                           </ul>
                                                                                    </div>
                                                                             </div>
                                                                      </li>
                                                               </ul>
                                                        </div>
                                                 </div><!-- .nk-tb-item -->
                                          @endforeach
                                   </div><!-- .nk-tb-list -->
                                   {{ $students->links() }}
                            </div><!-- .nk-block -->
                      </div>
              </div>
       </div>
</div>


