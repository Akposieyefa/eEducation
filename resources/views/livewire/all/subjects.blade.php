<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">            
                            <div class="nk-block">
                                   @livewire('modals.subject')
                                   <div class="mb-3 nk-tb-list is-separate">
                                          <div class="nk-tb-item nk-tb-head">
                                                 <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                               <input type="checkbox" class="custom-control" wire:model="selectAll">
                                                        </div>
                                                 </div>
                                                 <div class="nk-tb-col"><span class="sub-text">Subject Name</span></div>
                                                 <!--<div class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></div>-->
                                                 <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                               <li>
                                                                      <div class="drodown">
                                                                             <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                             <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                           @admin
                                                                                                  <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove </span></a></li>
                                                                                           @endadmin
                                                                                    </ul>
                                                                             </div>
                                                                      </div>
                                                               </li>
                                                        </ul>
                                                 </div>
                                          </div><!-- .nk-tb-item -->
                                          @foreach($subjects as $subject)
                                          <div class="nk-tb-item">
                                                 <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                               <input type="checkbox" class="custom-control" wire:model="selectedSubjects" value="{{ $subject->id }}">
                                                               <label class="custom-control"></label>
                                                        </div>
                                                 </div>
                                                 <div class="nk-tb-col">
                                                        <a href="">
                                                               <div class="user-card">
                                                                      <div class="user-info">
                                                                             <span class="tb-lead">{{ $subject->name }}<span class="ml-1 dot dot-success d-md-none"></span></span>
                                                                      </div>
                                                               </div>
                                                        </a>
                                                 </div>
                                                 <!--<div class="nk-tb-col tb-col-md">
                                                        <span>{{ $subject->created_at->diffForHumans() }}</span>
                                                 </div>-->
                                                 <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1">
                                                               <li>
                                                                      <div class="drodown">
                                                                             <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                             <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                           @admin
                                                                                           <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
                                                                                           @endadmin
                                                                                           @teacher
                                                                                                  <li><a href="#" wire:click="exportStudents()"><em class="icon ni ni-list"></em><span> Download Result Template</span></a></li>
                                                                                           @endteacher
                                                                                    </ul>
                                                                             </div>
                                                                      </div>
                                                               </li>
                                                        </ul>
                                                 </div>
                                          </div><!-- .nk-tb-item -->
                                          @endforeach
                                   </div><!-- .nk-tb-list -->
                                   @admin
                                   {{ $subjects->links() }}
                                   @endadmin
                            </div><!-- .nk-block -->
                     </div>
              </div>
       </div>
</div>



