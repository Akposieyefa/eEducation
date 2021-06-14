<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                             <div class="nk-block">
                                   @livewire('modals.student')
                                   <table class="datatable-init nowrap nk-tb-list is-separate dataTable no-footer" data-auto-responsive="true" id="DataTables_Table_2" role="grid">
                                          <thead>
                                                 <tr class="nk-tb-item nk-tb-head" role="row">
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
                                                                                           <li><a href="#" wire:click="exportBulkStudents()"><em class="icon ni ni-shield-star"></em><span>Download</span></a></li>
                                                                                           {{-- <li><ahref="#"onclick="returnconfirm('Areyousureyouwanttopromotethisstudents...?')||even.stopImmediatePropagation()"wire:click="promoteMultiStudents()"><emclass="iconnini-shield-star"></em><span>PromoteStudents</span></a></li> --}}
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
                                                                                                         {{--<li>
                                                                                                                <a href="javascript:void(0)" class="text-danger"
                                                                                                                       onclick="return confirm('Are you sure you want to delete?') ? @this.deleteSingleRecord({{$student->id}}) : false">
                                                                                                                       <em class="icon ni ni-trash"></em>
                                                                                                                       Delete
                                                                                                                </a>
                                                                                                         </li>--}}
                                                                                                  @endadmin
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




