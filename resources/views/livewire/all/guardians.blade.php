<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                            <div class="nk-block">
                                   @livewire('modals.guardian')
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
                                                 <div class="nk-tb-col"><span class="sub-text">Guardian</span></div>
                                                 <div class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Occupation</span></div>
                                                 <div class="nk-tb-col tb-col-lg"><span class="sub-text">Home Address</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Office Address</span></div>
                                                 <!--<div class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></div>-->
                                                 <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                               <li>
                                                                      <div class="drodown">
                                                                             <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                             <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                           <li>
                                                                                                  <a href="javascript:void(0)" class="text-danger"
                                                                                                  onclick="return confirm('Are you sure you want to delete?') ? @this.deleteRecirds() : false">
                                                                                                         <em class="icon ni ni-trash"></em>
                                                                                                         Remove Selected
                                                                                                  </a>
                                                                                           </li>
                                                                                           <!--<li><a href="#" onclick="return confirm('Are you sure you want to delete this...?') || even.stopImmediatePropagation()" wire:click="deleteRecords()" ><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a></li>-->
                                                                                           <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Download</span></a></li>
                                                                                    </ul>
                                                                             </div>
                                                                      </div>
                                                               </li>
                                                        </ul>
                                                 </div>
                                          </div><!-- .nk-tb-item -->
                                          @admin 
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
                                                               <span>{{ $guardian->occupation }} </span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                               <span>{{ $guardian->home_address }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                               <span>{{ $guardian->office_address }}</span>
                                                        </div>
                                                        <!--<div class="nk-tb-col tb-col-lg">
                                                               <span>{{ $guardian->created_at->diffForHumans() }}</span>
                                                        </div>-->
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                               <ul class="nk-tb-actions gx-1">
                                                                      <li class="nk-tb-action-hidden">
                                                                             <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                                    <em class="icon ni ni-mail-fill"></em>
                                                                             </a>
                                                                      </li>
                                                                      <li>
                                                                             <div class="drodown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                           <ul class="link-list-opt no-bdr">
                                                                                                  <li><a href="#"><em class="icon ni ni-eye"></em><span>Profile</span></a></li>
                                                                                                  <li><a href="#" wire:click="editGuardian({{ $guardian->id }})"><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                                                  <li>
                                                                                                         <a href="javascript:void(0)" class="text-danger"
                                                                                                                onclick="return confirm('Are you sure you want to delete?') ? @this.deleteSingleRecord({{$guardian->id}}) : false">
                                                                                                                <em class="icon ni ni-trash"></em>
                                                                                                                Delete
                                                                                                         </a>
                                                                                                  </li>
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
                                @endadmin
                                @student
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Full Name</span>
                                                <span class="data-value"></span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Gender</span>
                                                <span class="data-value">{{ auth()->user()->student  }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Email</span>
                                                <span class="data-value">{{ auth()->user() }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Phone Number</span>
                                                <span class="data-value text-soft">{{ auth()->user() }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Occupation</span>
                                                <span class="data-value">{{ auth()->user() }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Home Address</span>
                                                <span class="data-value">{{ auth()->user()  }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Office Address</span>
                                                <span class="data-value">{{  auth()->user() }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Number of Ward</span>
                                                <span class="data-value">{{auth()->user() }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <!--<div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Created Date</span>
                                                <span class="data-value">{{ auth()->user() }}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                        </div>--><!-- data-item -->
                                    </div><!-- data-list -->
                                </div><!-- .nk-block -->
                                @endstudent
                            </div><!-- .nk-block -->
                     </div>
              </div>
       </div>
</div>




