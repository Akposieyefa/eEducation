<div>
       <div class="row mt-5 mb-5">
              <div class="col-9"><h3> Manage {{ "Arm" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormArmModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Create New Arm
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isCreateArmOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Create New Arm</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
                                   <form wire:submit.prevent="submit">
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.select title="Select class" wire:model="level_id">
                                                               <x-forms.option value="">Select Class</x-forms.option>
                                                               @foreach($classes as $class)
                                                                      <x-forms.option value="{{ $class->id }}">{{ $class->name }}</x-forms.option>
                                                               @endforeach
                                                        </x-forms.select>
                                                        @error('level_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="text" wire:model="name" placeholder="Enter Class Name" title="Enter Class Name" />
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

