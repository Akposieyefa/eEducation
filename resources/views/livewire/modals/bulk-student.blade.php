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
                                                                   <h3 class="card-title">Bulk Student Upload</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                   <x-alerts.success />
                                                                    <x-alerts.error />
                                                                    <x-alerts.info />

                                                                   <form wire:submit.prevent="submit">
                                                                          <div class="form-group row">
                                                                                 <div class="col-md-12">
                                                                                        <label class="form-label">Select Level</label>
                                                                                        <select name="cars" id="subject_id" class="form-control" wire:model="level_id">
                                                                                         <option value="">Select Level</option>
                                                                                               @foreach($levels as $level)
                                                                                               <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                                                                @endforeach
                                                                                        </select>
                                                                                        @error('level_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                                                 </div>
                                                                          </div>

                                                                          <div class="form-group row">
                                                                                 <div class="col-md-12">
                                                                                        <label class="form-label">Upload Student Sheet</label>
                                                                                        <x-forms.input type="file" wire:model="studentSheet" title="Select Student Sheet" />
                                                                                        @error('studentSheet') <span class="text-danger">{{ $message }}</span> @enderror
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

