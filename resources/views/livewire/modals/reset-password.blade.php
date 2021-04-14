<div>
       <div class="row mt-5 mb-5">
              <div class="col-md-3 offset-md-9">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormPasswordModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Reset Password
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isPasswordResetOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Reset My Password</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
                                     <x-alerts.error />
                                   <form wire:submit.prevent="submit">
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="password" wire:model="oldpassword" placeholder="Enter your old password" title="Enter your old password" />
                                                        @error('oldpassword') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                           <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="password" wire:model="password" placeholder="Enter new password" title="Enter new password" />
                                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input type="password" wire:model="confirm_password" placeholder="Enter password confirmation" title="Enter password confirmation" />
                                                        @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
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
