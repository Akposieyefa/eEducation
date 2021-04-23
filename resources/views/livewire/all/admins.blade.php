<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                            <div class="nk-block">
                                   @livewire('modals.admin')
                                   <div class="row mb-3" style="border:0px solid red;">
                                                    <div class="col-md-3 offset-8">
                                                        <input type="search" class="form-control form-control-sm" placeholder="Type in to Search" />
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
                                                 <div class="nk-tb-col"><span class="sub-text">Administrator</span></div>
                                                 <div class="nk-tb-col tb-col-mb"><span class="sub-text">Gender</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Address</span></div>
                                                 <div class="nk-tb-col tb-col-lg"><span class="sub-text">Phone</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
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
                                          @foreach($admins as $admin)
                                                 <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                               <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                      <input type="checkbox" class="custom-control" wire:model="selectedAdmins" value="{{ $admin->id }}">
                                                                      <label class="custom-control"></label>
                                                               </div>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                               <a href="#">
                                                                      <div class="user-card">
                                                                             <div class="user-info">
                                                                                    <span class="tb-lead">{{ $admin->fullname }} <span class="ml-1 dot dot-success d-md-none"></span></span>
                                                                                    <span>{{ $admin->user->email }}</span>
                                                                             </div>
                                                                      </div>
                                                               </a>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                               <span class="tb-amount">{{ $admin->gender }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                               <span>{{ $admin->address }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                               <span>{{ $admin->phone }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                               <span class="tb-status text-success">Active</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                               <ul class="nk-tb-actions gx-1">
                                                                      <li>
                                                                             <div class="drodown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                           <ul class="link-list-opt no-bdr">
                                                                                                  <li><a href="#"><em class="icon ni ni-eye"></em><span>Profile</span></a></li>
                                                                                                  <li><a href="#" wire:click="editAdmin({{ $admin->id }})" ><em class="icon ni ni-edit"></em><span>Edit </span></a></li>
                                                                                                  <li><a href="#" onclick="return confirm('Are you sure you want to delete this...?') || even.stopImmediatePropagation()" wire:click="deleteSingleRecords({{ $admin->id }})"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                                           </ul>
                                                                                    </div>
                                                                             </div>
                                                                      </li>
                                                               </ul>
                                                        </div>
                                                 </div><!-- .nk-tb-item -->
                                          @endforeach
                                   </div><!-- .nk-tb-list -->
                                   {{ $admins->links() }}
                            </div><!-- .nk-block -->
                     </div>
              </div>
       </div>
</div>



