<div class="nk-block">
        @livewire('modals.guardian')
        <div class="mb-3 nk-tb-list is-separate">
               <div class="nk-tb-item nk-tb-head">
                      <div class="nk-tb-col nk-tb-col-check">
                             <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control" wire:model="selectAll">
                             </div>
                      </div>
                      <div class="nk-tb-col"><span class="sub-text">Guardian</span></div>
                      <div class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></div>
                      <div class="nk-tb-col tb-col-md"><span class="sub-text">Occupation</span></div>
                      <div class="nk-tb-col tb-col-lg"><span class="sub-text">Home Address</span></div>
                      <div class="nk-tb-col tb-col-md"><span class="sub-text">Office Address</span></div>
                      <div class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></div>
                      <div class="nk-tb-col nk-tb-col-tools">
                             <ul class="nk-tb-actions gx-1 my-n1">
                                    <li>
                                           <div class="drodown">
                                                  <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                         <ul class="link-list-opt no-bdr">
                                                                <li><a href="#" onclick="return confirm('Are you sure you want to delete this...?') || even.stopImmediatePropagation()" wire:click="deleteRecords()" ><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Download</span></a></li>
                                                         </ul>
                                                  </div>
                                           </div>
                                    </li>
                             </ul>
                      </div>
               </div><!-- .nk-tb-item -->
               @foreach($guardians as $guardian)
                     <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                   <div class="custom-control custom-control-sm custom-checkbox notext">
                                          <input type="checkbox" class="custom-control" wire:model="selectedGuardians" value="{{ $guardian->id }}">
                                          <label class="custom-control"></label>
                                   </div>
                            </div>
                            <div class="nk-tb-col">
                                   <a href="#">
                                          <div class="user-card">
                                                 <div class="user-avatar bg-primary">
                                                        <span>
                                                               <img class="profile-user-img img-fluid img-circle"
                                                               src="{{asset('storage/passports/'.$guardian->passport) }}"
                                                               alt="Student Passport"
                                                               >
                                                        </span>
                                                 </div>
                                                 <div class="user-info">
                                                        <span class="tb-lead">{{ $guardian->fullname }} <span class="ml-1 dot dot-success d-md-none"></span></span>
                                                        <span>{{ $guardian->user->email }}</span>
                                                 </div>
                                          </div>
                                   </a>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                   <span class="tb-amount">{{ $guardian->phone }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                   <span>{{ $guardian->occupation }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-lg">
                                   <span>{{ $guardian->home_address }}</span>
                            </div>
                             <div class="nk-tb-col tb-col-lg">
                                   <span>{{ $guardian->office_address }}</span>
                            </div>
                             <div class="nk-tb-col tb-col-lg">
                                   <span>{{ $guardian->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                   <ul class="nk-tb-actions gx-1">
                                          <li class="nk-tb-action-hidden">
                                                 <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                        <em class="icon ni ni-mail-fill"></em>
                                                 </a>
                                          </li>
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
                                                                      <li><a href="#" wire:click="editGuardian({{ $guardian->id }})"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                      <li><a href="#" onclick="return confirm('Are you sure you want to delete this...?') || even.stopImmediatePropagation()" wire:click="deleteSingleRecord({{ $guardian->id }})"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                               </ul>
                                                        </div>
                                                 </div>
                                          </li>
                                   </ul>
                            </div>
                     </div><!-- .nk-tb-item -->
               @endforeach
        </div><!-- .nk-tb-list -->
       {{ $guardians->links() }}
 </div><!-- .nk-block -->


