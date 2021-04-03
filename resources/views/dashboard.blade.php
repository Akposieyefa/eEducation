@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <!--<div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title page-title">Dashboard</h4>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="nk-block">
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-inner">                                            
                                                    <div class="w-100">
                                                        <h4 class="text-center">Welcome Admin</h4>
                                                        <h4 class="text-center mt-3 mb-5">Today's Date is {{ date('F m, Y') }}</h4>
                                                        <div class="fs-20px text-center fw-bold">
                                                            Current Session: <span class="badge badge-primary badge-pill badge-outline fs-20px p-2"> 2020/2021</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            Current Term: <span class="badge badge-primary badge-pill fs-20px p-2"> 2nd Term</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-gs">
                                        <div class="col-xxl-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Students</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">1,945</div>
                                                                <em class="icon ni ni-users" style="font-size: 4rem"></em>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->                                                   
                                        </div><!-- .col -->
                                        <div class="col-xxl-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Subjects</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">35</div>
                                                                <em class="icon ni ni-book-read" style="font-size: 4rem"></em>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-4">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Staff</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">73</div>
                                                                <em class="icon ni ni-user-list" style="font-size: 4rem"></em>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-12">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h4 class="title">List of all Students</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list mt-n2">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>ID.</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Class</span></div>
                                                        <div class="nk-tb-col"><span>Date of Birth</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Parent Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Mobile Number</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Address</span></div>
                                                        <div class="nk-tb-col"><span class="d-none d-sm-inline">Action</span></div>
                                                    </div>
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead"><a href="#">PRE1234</a></span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub">JSS 2</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub">26th April, 2006</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub">Abu Bin</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub">0909890743</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub">3979 Ashwood Drive, Zaria</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"></span>
                                                        </div>
                                                    </div>
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
