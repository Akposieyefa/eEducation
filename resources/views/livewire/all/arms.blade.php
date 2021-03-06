<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                            <div class="nk-block">
                                   @livewire('modals.arm')
                                   <div class="mb-3 nk-tb-list is-separate">
                                          <div class="nk-tb-item nk-tb-head">
                                                 <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                               <input type="checkbox" class="custom-control" wire:model="selectAll">
                                                        </div>
                                                 </div>
                                                 <div class="nk-tb-col"><span class="sub-text">Class Arms</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Class Name</span></div>
                                                 <div class="nk-tb-col tb-col-lg"><span class="sub-text">Students</span></div>
                                                 <div class="nk-tb-col tb-col-lg"><span class="sub-text">Subjects</span></div>
                                                 <div class="nk-tb-col tb-col-md"><span class="sub-text">Created Date</span></div>
                                                 <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                               <li>
                                                                      <div class="drodown">
                                                                             <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                             <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                           <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a></li>
                                                                                    </ul>
                                                                             </div>
                                                                      </div>
                                                               </li>
                                                        </ul>
                                                 </div>
                                          </div><!-- .nk-tb-item -->
                                          @foreach($arms as $arm)
                                                 <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                               <input type="checkbox" class="custom-control" wire:model="selectedArms" value="{{ $arm->id }}">
                                                               <label class="custom-control"></label>
                                                        </div>
                                                 </div>
                                                        <div class="nk-tb-col">
                                                               <a href="html/ecommerce/customer-details.html">
                                                                      <div class="user-card">
                                                                             <div class="user-avatar bg-primary">
                                                                                    <span>
                                                                                    {{ substr($arm->name, 0,1) }}
                                                                                    </span>
                                                                             </div>
                                                                             <div class="user-info">
                                                                                    <span class="tb-lead">{{ $arm->name }} <span class="ml-1 dot dot-success d-md-none"></span></span>
                                                                             </div>
                                                                      </div>
                                                               </a>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                               <span class="tb-amount">{{ $arm->level->name }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                               <span class="tb-amount">{{ $arm->students->count() }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                               <span class="tb-amount">{{ $arm->level->subjects->count() }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                               <span>{{ $arm->created_at->diffForHumans() }}</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                               <ul class="nk-tb-actions gx-1">
                                                                      <li>
                                                                             <div class="drodown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                           <ul class="link-list-opt no-bdr">
                                                                                                  <li><a href="#"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                                           </ul>
                                                                                    </div>
                                                                             </div>
                                                                      </li>
                                                               </ul>
                                                        </div>
                                                 </div><!-- .nk-tb-item -->
                                          @endforeach
                                   </div><!-- .nk-tb-list -->
                                   {{ $arms->links() }}
                            </div><!-- .nk-block -->
                     </div>
              </div>
       </div>
</div>




