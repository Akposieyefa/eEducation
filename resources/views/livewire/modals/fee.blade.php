@admin
<div>
       <div class="mt-5 mb-5 row">
              <div class="col-7"><h3> {{ "Fees" }} </h3></div>
              <div class="col-2">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormFeeModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Add Term Fee
                     </x-forms.buttons.success>
              </div>
              <div class="col-3">
                     <a href="{{ route('all-payments') }}" class="btn btn-success">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; View Fees Payments
                     </a>
              </div>
       </div>
       <!-- Modal -->
       @if($isCreateFeeOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Add Term School Fee</h5>
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
                                                        <label class="form-label mr-5">Select Session <small class="text-danger">*</small></label>
                                                        <x-forms.select title="Select class" wire:model="selectedSection">
                                                               <x-forms.option value="">Select Session</x-forms.option>
                                                               @foreach($sections as $section)
                                                                      <x-forms.option value="{{ $section->id }}">{{ $section->name }}</x-forms.option>
                                                               @endforeach
                                                        </x-forms.select>
                                                        @error('selectedSection') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                            <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <label class="form-label mr-5">Select Term <small class="text-danger">*</small></label>
                                                        <x-forms.select title="Select class" wire:model="selectedTerm">
                                                               <x-forms.option value="">Select Term</x-forms.option>
                                                            @if(!is_null($selectedSection))
                                                               @foreach($terms as $term)
                                                                      <x-forms.option value="{{ $term->id }}">{{ $term->name }}</x-forms.option>
                                                               @endforeach
                                                            @endif
                                                        </x-forms.select>
                                                        @error('selectedTerm') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                             <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <label class="form-label mr-5">Select Class <small class="text-danger">*</small></label>
                                                        <x-forms.select title="Select class" wire:model="level_id">
                                                               <x-forms.option value="">Select Class</x-forms.option>
                                                               @foreach($levels as $level)
                                                                      <x-forms.option value="{{ $level->id }}">{{ $level->name }}</x-forms.option>
                                                               @endforeach
                                                        </x-forms.select>
                                                        @error('level_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <label class="form-label mr-5">Amount <small class="text-danger">*</small></label>
                                                        <x-forms.input type="text" wire:model="amount" placeholder="Enter School Fee Amount" title="Enter School Fee Amount" />
                                                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>

                                          <div class="modal-footer">
                                                 <x-forms.buttons.danger data-dismiss="modal" wire:click="close()">Close</x-forms.buttons.danger>
                                                 <x-forms.buttons.success type="submit">Add</x-forms.buttons.success>
                                          </div>
                                   </form>
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>
@endadmin

