<div>
       <div class="row mt-5 mb-5">
              <div class="col-9"><h3> Manage {{ "Term" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormTermModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Create New Term
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isCreateTermOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Create New Term</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
                                   <form wire:submit.prevent="submit">
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.select title="Select class" wire:model="section_id">
                                                               <x-forms.option value="">Select Sections</x-forms.option>
                                                               @foreach($sections as $section)
                                                                      <x-forms.option value="{{ $section->id }}">{{ $section->name }}</x-forms.option>
                                                               @endforeach
                                                        </x-forms.select>
                                                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="text" wire:model="name" placeholder="Enter Term Name" title="Enter Term Name" />
                                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                           <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="date" wire:model="start_date" placeholder="Enter Term Start Date" title="Enter Term Start Date" />
                                                        @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="date" wire:model="end_date" placeholder="Enter Term End Date" title="Enter Term End Date" />
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

