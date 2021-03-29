<div>
       <x-jumbotron>
              <h3> {{ "Complain" }} </h3>
              <div class="col-1 offset-11">
                     <x-forms.buttons.secondary data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormComplainModal')">
                            Create
                     </x-forms.buttons.secondary>
              </div>
       </x-jumbotron>
       <!-- Modal -->
       @if($isComplainOpen)
       <div class="modal d-block" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Send Complian</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <x-alerts.success />
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
                            </div>
                            <div class="modal-footer">
                                    <x-forms.buttons.danger wire:click="close()" data-dismiss="modal">Close</x-forms.buttons.danger>
                                    <x-forms.buttons.success wire:click="submit()" type="submit">Send</x-forms.buttons.success>
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>

