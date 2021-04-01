<div>
       <div class="row mt-5 mb-5">
              <div class="col-9"><h3> Manage {{ "Mails" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormMailModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Send New Mail
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isCreateMailOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Send Mail Blast</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                <x-alerts.success />
                                <div class="form-group row">
                                        <div class="col-md-12">
                                            <x-forms.input type="text" wire:model="subject" placeholder="Mail Subject" title="Enter Mail Message Subject" />
                                            @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                </div>
                                  <div class="form-group row" wire:model="message" wire:ignore>
                                          <div class="col-md-12">
                                                 <input id="message"  value=""  type="hidden"  name="content" />
                                                 <trix-editor input="message"></trix-editor>
                                                 @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                            </div>
                             <div class="modal-footer">
                                    <x-forms.buttons.danger data-dismiss="modal" wire:click="close()">Close</x-forms.buttons.danger>
                                    <x-forms.buttons.success wire:click="submit()" type="submit">Save</x-forms.buttons.success>
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>


