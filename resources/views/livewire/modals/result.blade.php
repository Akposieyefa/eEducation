<div class="nk-content ">
       <div class="container-fluid">
              <div class="nk-content-inner">
                     <div class="nk-content-body">
                            <!-- Main content -->
                            <section class="content">
                                   <div class="container-fluid"><br>
                                          <div class="row">
                                                 <!-- left column -->
                                                 <div class="col-md-12">
                                                        <!-- jquery validation -->
                                                        <div class="card card-primar">
                                                               <div class="card-header">
                                                                      <h3 class="card-title">Upload Result</h3>
                                                               </div>
                                                               <!-- /.card-header -->
                                                               <div class="card-body">
                                                                      <x-alerts.success />

                                                                      <form wire:submit.prevent="submit">
                                                                             <div class="form-group row">
                                                                                    <div class="col-md-12">
                                                                                           <label class="form-label">Select Subject</label>
                                                                                           <select name="cars" id="subject_id" class="form-control" wire:model="subject_id">
                                                                                            <option value="">Select Subject</option>
                                                                                                  @foreach($subjects as $subject)
                                                                                                  <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                                                   @endforeach
                                                                                           </select>
                                                                                           @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                                                    </div>
                                                                             </div>
                                                                             <div class="form-group row">
                                                                                    <div class="col-md-12">
                                                                                           <label class="form-label">Select Term</label>
                                                                                           <select name="cars" id="term" class="form-control" wire:model="term">
                                                                                            <option value="">Select Term</option>
                                                                                                  @foreach($terms as $term)
                                                                                                  <option value="{{ $term->id }}">{{ $term->name }}</option>
                                                                                                   @endforeach
                                                                                           </select>
                                                                                           @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                                                                                    </div>
                                                                             </div>
                                                                             <div class="form-group row">
                                                                                    <div class="col-md-12">
                                                                                           <label class="form-label">Upload Result Sheet</label>
                                                                                           <x-forms.input type="file" wire:model="resultSheet" title="Select Result Sheet" />
                                                                                           @error('resultSheet') <span class="text-danger">{{ $message }}</span> @enderror
                                                                                    </div>
                                                                             </div>
                                                                      </form>

                                                               </div>
                                                               <div class="card-footer">
                                                                      <button wire:click="submit()" type="submit" class="btn btn-primary">Submit</button>
                                                               </div>
                                                        </div>
                                                        <!-- /.card -->
                                                 </div>
                                          </div>
                                          <!-- /.row -->
                                   </div><!-- /.container-fluid -->
                            </section>
                            <!-- /.content -->
                     </div>
              </div>
       </div>
</div>

