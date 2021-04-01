<div>
       <div class="row mt-5 mb-5">
              <div class="col-9"><h3>Manage  {{ "Students" }} </h3> </div>
              <div class="col-3">
                     <x-forms.buttons.success data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormStudentModal')">
                            <em class="ni ni-plus"></em> &nbsp;&nbsp;Create New Student
                     </x-forms.buttons.success>
              </div>
       </div>
       <!-- Modal -->
       @if($isStudentOpen)
       <div class="modal d-block" id="exampleModalLong" style="background: rgba(0,0,0,0.5);" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">
                                          @if ($update_mode)
                                                 Edit Student Details
                                          @else
                                                 Student Registration Form
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
                                                 <x-forms.input wire:model="fname" type="text" placeholder="Enter First Name" title="First Name of Student" />
                                                        @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="mname" type="text" placeholder="Enter Middle Name" title="Middle Name of Student" />
                                                        @error('mname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="lname" type="text" placeholder="Enter Last Name" title="Last Name of Student" />
                                                        @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="dob" type="date" title="Date of birth" />
                                                 @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="nationality" type="text" placeholder="Naionality" title="Nationality of Student" />
                                                 @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <x-forms.input wire:model="email" type="text" placeholder="Enter Email" title="Student Email Address" />
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="address" type="text" placeholder="Residential Address" title="Residental Address of Student" />
                                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
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
                                          <div class="col-md-6">
                                                 <x-forms.select wire:model="selectedState" title="State of Origin of Student">
                                                        <x-forms.option value="">Select State</x-forms.option>
                                                        @foreach($states as $state)
                                                                      <x-forms.option value="{{ $state->id }}"> {{ $state->name }}</x-forms.option>
                                                        @endforeach
                                                 </x-forms.select>
                                                        @error('selectedState') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">

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
                                   <div class="form-group row">
                                          <div class="col-md-6">
                                                 <x-forms.select wire:model="selectedClass" title="Student Class">
                                                        <x-forms.option value="">Select Class</x-forms.option>
                                                        @foreach($levels as $level)
                                                                      <x-forms.option value="{{ $level->id }}"> {{ $level->name }}</x-forms.option>
                                                        @endforeach
                                                 </x-forms.select>
                                                        @error('selectedClass') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="col-md-6">
                                                 <x-forms.select wire:model="selectedArm" title="Student Arm">
                                                        <x-forms.option value="">Select Class Arm</x-forms.option>
                                                        @if(!is_null($selectedClass))
                                                               @foreach($arms as $arm)
                                                                      <x-forms.option value="{{ $arm->id }}"> {{ $arm->name }}</x-forms.option>
                                                               @endforeach
                                                        @endif
                                                 </x-forms.select>
                                                        @error('selectedArm') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <div class="col-md-12">
                                                 <x-forms.input wire:model="passport" type="file" title="Student Recent Passport" />
                                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                          </div>
                                   </div>
                            </div>
                            <div class="modal-footer">
                                   <x-forms.buttons.danger wire:click="close()" wire:click="close()" data-dismiss="modal">Close</x-forms.buttons.danger>
                                   @if ($update_mode)
                                          <x-forms.buttons.success wire:click="updateStudent()">Update</x-forms.buttons.success>
                                   @else
                                          <x-forms.buttons.success wire:click="submit()">Create</x-forms.buttons.success>
                                   @endif
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>

