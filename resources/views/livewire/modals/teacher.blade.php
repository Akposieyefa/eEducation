<div>
        <x-jumbotron>
              <h3> {{ "Teachers" }} </h3>
              <div class="col-1 offset-11">
                     <x-forms.buttons.secondary data-toggle="modal" data-target="#exampleModalLong" wire:click="$emit('showFormTeacherModal')">
                      Create 
                     </x-forms.buttons.secondary>
              </div>
       </x-jumbotron>
       <!-- Modal -->
       @if($isTeacherOpen)
       <div class="modal d-block" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Teachers Registration Form</h5>
                                   <button type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                              <x-alerts.success />
                                   <form wire:submit.prevent="submit" enctype="multipart/form-data">
                                          <div class="form-group row">
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="fname" type="text" placeholder="Enter First Name" title="First Name of Teacher" />
                                                         @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="mname" type="text" placeholder="Enter Middle Name" title="Middle Name of Teacher" />
                                                         @error('mname') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="lname" type="text" placeholder="Enter Last Name" title="Last Name of Teacher" />
                                                         @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="dob" type="date" title="Date of birth" />
                                                         @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="nationality" type="text" placeholder="Naionality" title="Nationality of Teacher" />
                                                         @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="employment_date" type="date" title="Employment Date" />
                                                         @error('employment_date') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <div class="col-md-12">
                                                        <x-forms.input wire:model="address" type="text" placeholder="Residential Address" title="Residental Address of Teacher" />
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
                                                 <div class="col-md-12">
                                                        <x-forms.input wire:model="email" type="text" placeholder="Enter Email" title="Student Email Address" />
                                                         @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
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
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="passport" type="file" title="Teacher Recent Passport" />
                                                        @error('passport') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                                 <div class="col-md-6">
                                                        <x-forms.input wire:model="resume" type="file" title="Teacher Resume" />
                                                        @error('resume') <span class="text-danger">{{ $message }}</span> @enderror
                                                 </div>
                                          </div>
                                          <div class="modal-footer">
                                                 <x-forms.buttons.danger data-dismiss="modal">Close</x-forms.buttons.danger>
                                                 <x-forms.buttons.success>Save</x-forms.buttons.success>
                                          </div>
                            </form>
                            </div>
                     </div>
              </div>
       </div>

       @endif
</div>

