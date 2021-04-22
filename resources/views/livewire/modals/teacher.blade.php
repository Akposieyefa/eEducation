<div>
       <div class="row mt-3 mb-5">
              <div class="col-9"><h3> List of {{ "Staff" }} </h3></div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormTeacherModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Add New Staff
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isTeacherOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5); overflow:auto;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">
                                   @if ($update_mode)
                                          Edit Staff Details
                                   @else
                                          Add New Staff 
                                   @endif
                                   </h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                                   <p class="text-danger">NOTE: All fields with <b>*</b> are compulsory</p>
                                   <x-alerts.success />
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <label class="form-label">First Name <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="fname" type="text" placeholder="Enter First Name" title="First Name of Teacher" />
                                                        @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <label class="form-label">Middle Name <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="mname" type="text" placeholder="Enter Middle Name" title="Middle Name of Teacher" />
                                                        @error('mname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <label class="form-label">Last Name <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="lname" type="text" placeholder="Enter Last Name" title="Last Name of Teacher" />
                                                        @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <label class="form-label">Date of Birth <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="dob" type="date" title="Date of birth" />
                                                        @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <label class="form-label">Nationality <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="nationality" type="text" placeholder="Naionality" title="Nationality of Teacher" />
                                                        @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <label class="form-label">Employment Date <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="employment_date" type="date" title="Employment Date" />
                                                        @error('employment_date') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <label class="form-label">Residential Address <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="address" type="text" placeholder="Residential Address" title="Residental Address of Teacher" />
                                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">                                                 
                                          <div class="col-md-12">
                                                 <label class="form-label mr-5">Gender <small class="text-danger">*</small></label>
                                                 <div class="custom-control custom-control-lg custom-radio mr-5 ml-3">
                                                        <x-forms.radio wire:model="gender" id="male" name="gender"  value="Male" />
                                                        <label class="custom-control-label" for="male">Male</label>
                                                 </div>
                                                 <div class="custom-control custom-control-lg custom-radio">
                                                        <x-forms.radio wire:model="gender" id="female" name="gender" value="Female" /> 
                                                        <label class="custom-control-label" for="female">Female</label>
                                                 </div>
                                          </div>
                                                 @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <label class="form-label">Email Address <small class="text-danger">*</small></label>
                                                 <x-forms.input wire:model="email" type="text" placeholder="Enter Email" title="Email Address" />
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <label class="form-label">Select State of Origin <small class="text-info">(optional)</small></label>
                                                 <x-forms.select wire:model="selectedState" title="State of Origin of Student">
                                                        <x-forms.option value="">Select State</x-forms.option>
                                                        @foreach($states as $state)
                                                                      <x-forms.option value="{{ $state->id }}"> {{ $state->name }}</x-forms.option>
                                                        @endforeach
                                                 </x-forms.select>
                                                        @error('selectedState') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <label class="form-label">Select Local Government Area <small class="text-info">(optional)</small></label>
                                                 <x-forms.select wire:model="selectedLga" title="Local Government of Origin">
                                                        <x-forms.option value=""> Select Local Government Area</x-forms.option>
                                                        @if(!is_null($selectedState))
                                                               @foreach($lgas as $lga)
                                                                      <x-forms.option value="{{ $lga->id }}"> {{ $lga->name }}</x-forms.option>  
                                                               @endforeach
                                                        @endif
                                                               @error('selectedLga') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                 </x-forms.select>
                                          </div>
                                   </div>
                                   {{--<div class="form-group row">
                                          <div class="col-md-12">
                                                 <label class="form-label">Select Class <small class="text-danger">*</small></label>
                                                 <x-forms.select wire:model="selectedClass" title="Student Class">
                                                        <x-forms.option value="">Select Class</x-forms.option>
                                                        @foreach($levels as $level)
                                                                      <x-forms.option value="{{ $level->id }}"> {{ $level->name }}</x-forms.option>
                                                        @endforeach
                                                 </x-forms.select>
                                                        @error('selectedClass') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>--}}
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <label class="form-label">Upload Passport <small class="text-info">(optional)</small></label>
                                                 <x-forms.input wire:model="passport" type="file" title="Teacher Recent Passport" />
                                                 @error('passport') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                            </div>
                            <div class="modal-footer">
                                   <x-forms.buttons.danger data-dismiss="modal" wire:click="close()">Close</x-forms.buttons.danger>
                                   @if ($update_mode)
                                          <x-forms.buttons.success wire:click="updateTeacher()">Update</x-forms.buttons.success>
                                   @else
                                          <x-forms.buttons.success wire:click="submit()">Add</x-forms.buttons.success>
                                   @endif
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>

