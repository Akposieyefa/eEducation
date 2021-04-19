@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="mt-5 mb-5 row">
                                            <div class="col-8">&nbsp;</div>
                                            <div class="col-4">
                                                    <a href="{{ route('fees') }}" class="btn btn-success">
                                                            <em class="ni ni-plus"></em> &nbsp;&nbsp; Add Term Fee
                                                    </a>
                                            </div>
                                        </div>
                                    <div class="row g-gs">                                        
                                        <div class="col-xxl-12">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h4 class="title">List of all Payments</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list mt-n2">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>Student ID.</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Student Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Class</span></div>
                                                        <div class="nk-tb-col"><span>Payment Reference</span></div>                                                        
                                                        <div class="nk-tb-col tb-col-md"><span>Payment For</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Date Paid</span></div>
                                                    </div>
                                                    @foreach($payments as $payment)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">{{ $payment->student_id }}</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-lead">{{ $payment->student->fullname}}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">{{$payment->student->level->name}}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $payment->trans_ref  }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $payment->term->name }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $payment->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                    </div><!-- .row -->
                                    
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@endsection
