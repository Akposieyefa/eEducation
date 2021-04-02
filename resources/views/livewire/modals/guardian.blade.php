<div>
      <div class="row mt-3 mb-5">
              <div class="col-9"><h3> Manage {{ "Guardian" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormGuardianModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp;Create Guardian
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isGuardianOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">
                                          @if ($update_mode)
                                                 Edit Guardian Details
                                          @else
                                                 Guardian Registration Form
                                          @endif
                                   </h5>
                                   <button type="button" class="close" wire:click="close()" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                            <x-alerts.success />
                            <x-alerts.error />
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="fname" type="text" placeholder="Enter First Name" title="Enter Middle Name" />
                                                        @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="mname" type="text" placeholder="Enter Middle Name" title="Enter Middle Name" />
                                                        @error('mname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="lname" type="text" placeholder="Enter Last Name" title="Enter Last Name" />
                                                        @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="occupation" type="text" placeholder="Enter Occupuation" title="Enter Occupation" />
                                                 @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="email" type="text" placeholder="Enter Email Address" title="EnterEmail Address" />
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="home_address" type="text" placeholder="Residential Address" title="Residental Address" />
                                                        @error('home_address') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                    <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="office_address" type="text" placeholder="Office Address" title="Office Address" />
                                                        @error('office_address') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                    <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="student_id" type="text" placeholder="Enter Student ID" title="Enter Student ID" />
                                                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                    <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="phone" type="text" placeholder="Enter Phone Number" title="Enter Phone Number" />
                                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <x-forms.label  class="col-md-4 text-md-right h6">  Gender </x-forms.label>
                                          <div class="col-md-6">
                                                 <x-forms.radio wire:model="gender" value="Male" /> Male &nbsp
                                                 <x-forms.radio wire:model="gender" value="Female" /> Female
                                          </div>
                                                 @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="passport" type="file" title="Student Recent Passport" />
                                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                            </div>
                            <div class="modal-footer">
                                   <x-forms.buttons.danger wire:click="close()" data-dismiss="modal">Close</x-forms.buttons.danger>
                                   @if ($update_mode)
                                          <x-forms.buttons.success wire:click="updateGuardian()">Update</x-forms.buttons.success>
                                   @else
                                          <x-forms.buttons.success wire:click="submit()">Create</x-forms.buttons.success>
                                   @endif
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>


