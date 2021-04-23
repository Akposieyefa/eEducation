<div>
      <div class="row mt-3 mb-5">
              <div class="col-9"><h3> List of {{ "Guardians" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormGuardianModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp;Add Guardian
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isGuardianOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5); overflow:auto;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
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
                                   <p class="text-danger">NOTE: All fields with <b>*</b> are compulsory</p>
                                   <x-alerts.success />
                                   <x-alerts.error />
                                   <x-alerts.info />
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <label class="form-label">Student ID <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="student_id" type="text" placeholder="Enter Student ID" title="Enter Student ID" />
                                                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-4">
                                                 <label class="form-label">First Name <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="fname" type="text" placeholder="Enter First Name" title="Enter Middle Name" />
                                                        @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-4">
                                                 <label class="form-label">Middle Name <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="mname" type="text" placeholder="Enter Middle Name" title="Enter Middle Name" />
                                                        @error('mname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-4">
                                                 <label class="form-label">Last Name <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="lname" type="text" placeholder="Enter Last Name" title="Enter Last Name" />
                                                        @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-4">
                                                 <label class="form-label mr-3">Gender <small class="text-danger">*</small></label>
                                                 <br/>
                                                 <div class="custom-control custom-control-lg custom-radio mr-5 ml-1">
                                                        <x-forms.radio wire:model="gender" id="male" name="gender"  value="Male" />
                                                        <label class="custom-control-label" for="male">Male</label>
                                                 </div>
                                                 <div class="custom-control custom-control-lg custom-radio">
                                                        <x-forms.radio wire:model="gender" id="female" name="gender" value="Female" /> 
                                                        <label class="custom-control-label" for="female">Female</label>
                                                 </div>
                                                 @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-4">
                                                 <label class="form-label">Email Address <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="email" type="text" placeholder="Enter Email Address" title="EnterEmail Address" />
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-4">
                                                 <label class="form-label">Phone Number <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="phone" type="text" placeholder="Enter Phone Number" title="Enter Phone Number" />
                                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                                                                 
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-4">
                                                 <label class="form-label">Occupation <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="occupation" type="text" placeholder="Enter Occupuation" title="Enter Occupation" />
                                                 @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>   
                                          <div class="col-md-4">
                                                 <label class="form-label">Home Address <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="home_address" type="text" placeholder="Residential Address" title="Residental Address" />
                                                        @error('home_address') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-4">
                                                 <label class="form-label">Office address <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="office_address" type="text" placeholder="Office Address" title="Office Address" />
                                                        @error('office_address') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div> 
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <label class="form-label">Upload Passport <small class="text-info">(optional)</small></label>
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
                                          <x-forms.buttons.success wire:click="submit()">Add</x-forms.buttons.success>
                                   @endif
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>


