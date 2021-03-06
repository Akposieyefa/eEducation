<div>
       <div class="row mt-5 mb-5">
              <div class="col-8"><h3> List of {{ "Sessions" }} </h3></div>
              <div class="col-2">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormSectionModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Add New Session
                     </x-forms.buttons.success>
              </div>
              <div class="col-2">
                     <a href="{{ route('terms') }}" class="btn btn-success">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; List of Terms
                     </a>
              </div>
       </div>
       <!-- Modal -->
       @if($isCreateSectionOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Add New Session</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
                                   <x-alerts.error />
                                   <x-alerts.info />
                                   <form wire:submit.prevent="submit">
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="text" wire:model="name" placeholder="Enter Session Name" title="Enter Session Name" />
                                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="date" wire:model="start_date" placeholder="Enter Session Start Date" title="Enter Session Start Date" />
                                                        @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="date" wire:model="end_date" placeholder="Enter Session End Date" title="Enter Session End Date" />
                                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>

                                          <div class="modal-footer">
                                                 <x-forms.buttons.danger data-dismiss="modal" wire:click="close()">Close</x-forms.buttons.danger>
                                                 <x-forms.buttons.success type="submit">Save</x-forms.buttons.success>
                                          </div>
                                   </form>
                            </div>
                     </div>
              </div>
       </div>
       @endif

</div>

