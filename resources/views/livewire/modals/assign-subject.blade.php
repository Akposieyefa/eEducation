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
                                                <h3 class="card-title">Add Subject to Class</h3>
                                            </div>
                                        <!-- /.card-header -->
                                                <div class="card-body">
                                                <x-alerts.success />
                                                <x-alerts.error />
                                                    <div class="form-group">
                                                        <label for="schoolName">Class</label>
                                                        <x-forms.select wire:model="level_id" title="Student Class">
                                                            <x-forms.option value="">Select Class</x-forms.option>
                                                                            @foreach($levels as $level)
                                                                                <x-forms.option value="{{ $level->id }}"> {{ $level->name }}</x-forms.option>
                                                                            @endforeach
                                                                    </x-forms.select>
                                                                    @error('level_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Subject Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $count = 1;
                                                        @endphp
                                                        @foreach($subjects as $subject)
                                                            <tr>
                                                                <td>{{$count++}}</td>
                                                                <td>{{$subject->name}}</td>
                                                                <td>
                                                                    <input type="checkbox" value="{{ $subject->id}}" wire:model="subject_id">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Subject Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    {{ $subjects->links() }}
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

