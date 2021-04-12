<div>
       <div class="mt-3 mb-5 row">
              <div class="col-9"><h3> Manage {{ "Subject" }} </h3></div>
              @admin
                     <div class="col-3">
                            <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormSubjectModal')">
                                   <em class="ni ni-plus"></em> &nbsp;&nbsp; Create New Subject
                            </x-forms.buttons.success>
                     </div>
              @endadmin
       </div>
       @admin
       <!-- Modal -->
              @if($isSubjectOpen)
              <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Create Subject</h5>
                                          <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                   </div>
                                   <div class="modal-body">
                                          <x-alerts.success />
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                 <x-forms.input type="text" wire:model="name" placeholder="Enter Subject Name" title="Enter Subject Name" />
                                                 @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="modal-footer">
                                          <x-forms.buttons.danger wire:click="close()" data-dismiss="modal">Close</x-forms.buttons.danger>
                                          <x-forms.buttons.success wire:click="submit()" type="submit">Create</x-forms.buttons.success>
                                   </div>
                            </div>
                     </div>
              </div>

              @endif
       @endadmin
</div>

