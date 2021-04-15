@extends('layouts.app')
@section('content')
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
                                                <h3 class="card-title">School Fees Payment</h3>
                                            </div>
                                        <!-- /.card-header -->
                                                <div class="card-body">
                                                <x-alerts.success />
                                                 <form id="quickForm" method="post"  action="{{route('pay')}}" accept-charset="UTF-8" autocomplete="off">
                                                        @csrf
                                                        <x-alerts.error />
                                                               <div class="form-group">
                                                                      <x-forms.label> <strong>Enter Student Registration Number </strong></x-forms.label>
                                                                      <x-forms.input type="text" name="student_id" placeholder="Enter Student Registration Number" title="Enter Student Registration Number" />
                                                                      @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                               </div>
                                                        </div>
                                                        <div class="card-footer">
                                                               <button type="submit" class="btn btn-primary">Procced With Payment</button>
                                                        </div>
                                                </form>
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

@endsection