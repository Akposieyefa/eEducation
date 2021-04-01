<div>
       <div class="row mt-5 mb-5">
              <div class="col-9"><h3> Manage {{ "Notifications" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormNotificationModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Create New Notification
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isNotificationOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Send Notification</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
                                   <form wire:submit.prevent="submit">
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.select title="Notify role" wire:model="role_id">
                                                               <x-forms.option value="">Specific for role</x-forms.option>
                                                               @foreach($roles as $role)
                                                                      <x-forms.option value="{{ $role->id }}">{{ $role->name }}</x-forms.option>
                                                               @endforeach
                                                        </x-forms.select>
                                                        @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="text" wire:model="title" placeholder="Enter Subject" title="Enter Notification Subject" />
                                                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>

                                          <div class="form-group row" wire:model="body" wire:ignore>
                                                 <div class="col-md-12">
                                                       <input id="body"  value=""  type="hidden"  name="content" />
                                                        <trix-editor input="body"></trix-editor>
                                                        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
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

