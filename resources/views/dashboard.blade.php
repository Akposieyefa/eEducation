@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-inner">
                                                    <div class="w-100">
                                                        <h4 class="text-center">Welcome 
                                                            {{ (auth()->user()->roles[0]['name'] == 'Admin') ? auth()->user()->admin->fullname : '' }}
                                                            {{ (auth()->user()->roles[0]['name'] == 'Student') ? auth()->user()->student->fullname. ' ('. auth()->user()->student->admission_no.')' : '' }}
                                                            {{ (auth()->user()->roles[0]['name'] == 'Teacher') ? auth()->user()->teacher->fullname : '' }}
                                                            {{ (auth()->user()->roles[0]['name'] == 'Guardian') ? auth()->user()->guardian->fullname : '' }}
                                                        </h4>
                                                        <h4 class="text-center mt-3 mb-3">Today's Date is {{ date('F d, Y') }}</h4>
                                                        <div class="fs-20px text-center fw-bold mt-5">
                                                            @student
                                                                {{--&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    Admission No.: 
                                                                        <span class="badge badge-primary badge-pill fs-20px p-2"> 
                                                                            {{ auth()->user()->student->admission_no  }}
                                                                        </span>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;--}}
                                                            @endstudent
                                                            Current Session: <span class="badge badge-primary badge-pill badge-outline fs-20px p-2"> {{ activeSection() }}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            Current Term: <span class="badge badge-primary badge-pill fs-20px p-2"> {{ activeTerm() }}</span>
                                                            @student
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <div class="mt-5">
                                                                    Current Class: 
                                                                        <span class="badge badge-primary badge-pill fs-20px p-2"> 
                                                                            {{ studentCurrentClass(auth()->user()->student->level_id)  }}
                                                                        </span>
                                                                </div>
                                                            @endstudent
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @student
                                        <div class="row g-gs">
                                            <div class="col-sm-6 col-lg-6 col-xxl-6 offset-3">
                                                <div class="card">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-info">
                                                                        <h3 style="color:#006600;"> {{ studentCurrentClass(auth()->user()->student->level_id)  }} </h3>
                                                                </div>
                                                            </div>
                                                            <div class="team-view">
                                                                <a href="view-result" class="btn btn-round btn-outline-light w-150px"><span>View Result</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>
                                    @endstudent
                                    @admin
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
                                                                <div class="amount">{{ studentCount() }}</div>
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
                                                                <div class="amount">{{ subjectCount() }}</div>
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
                                                                <div class="amount">{{ teacherCount() }}</div>
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
                                                <div class="row mb-3" style="border:0px solid red;">
                                                    <div class="col-md-3 offset-8">
                                                        <input type="search" class="form-control form-control-sm" placeholder="Type in to Search" />
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                                <div class="nk-tb-list mt-n2">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>Admission No.</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Class</span></div>
                                                        <!--<div class="nk-tb-col"><span>Date of Birth</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Parent Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Mobile Number</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Address</span></div>-->
                                                    </div>
                                                    @foreach(allStudents() as $student)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead">{{ $student->admission_no }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-lead">{{ $student->fullname}}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">{{ $student->level->name }}</span>
                                                            </div>
                                                            <!--<div class="nk-tb-col">
                                                                <span class="tb-sub">{{ "" /*$student->dob*/ }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ "" /*isset($student->guardian->fullname)?$student->guardian->fullname:'No Guardian Yet'*/ }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ "" /*isset($student->guardian->phone)?$student->guardian->phone:'No Guardian Phone Number Yet' */}}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                            <span class="tb-sub">{{ "" /*$student->address*/ }}</span>
                                                            </div>-->
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                    </div><!-- .row -->
                                    @endadmin

                                    @teacher
                                    <div class="col-xxl-12">
                                        <div class="card card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h4 class="title">List of all Classes</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-list mt-n2">
                                                {{--<div class="row mb-3" style="border:0px solid red;">
                                                    <div class="col-md-3 offset-8">
                                                    <input type="search" wire:model="searchString" class="form-control form-control-sm" placeholder="Type in to Search" />
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>--}}
                                                <div class="mb-3 nk-tb-list is-separate">
                                                        <div class="nk-tb-item nk-tb-head">
                                                                <div class="nk-tb-col">
                                                                        <span class="sub-text">S/N </span>
                                                                </div>
                                                                <div class="nk-tb-col"><span class="sub-text">Class </span></div>
                                                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Students</span></div>
                                                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Subjects</span></div>
                                                       </div><!-- .nk-tb-item -->
                                                        @foreach($classes as $class)
                                                                <div class="nk-tb-item">
                                                                        <div class="nk-tb-col ">
                                                                            {{ $loop->index + 1 }}
                                                                        </div>
                                                                        <div class="nk-tb-col">
                                                                            <a href="#">
                                                                                    <div class="user-card">
                                                                                            <div class="user-info">
                                                                                                    <span class="tb-lead">{{ $class->name }} <span class="ml-1 dot dot-success d-md-none"></span></span>
                                                                                            </div>
                                                                                    </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">{{ $class->students->count() }}</span>
                                                                        </div>
                                                                        <div class="nk-tb-col tb-col-mb">
                                                                            <span class="tb-amount">{{ $class->subjects->count() }}</span>
                                                                        </div>
                                                                </div><!-- .nk-tb-item -->
                                                        @endforeach
                                                </div><!-- .nk-tb-list -->
                                            </div>
                                        </div><!-- .card -->
                                    </div>
                                    @endteacher

                                    @guardian
                                    <div class="row g-gs">

                                        <div class="col-xxl-12">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h4 class="title">My Wards</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list mt-n2">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>Admission No.</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Class</span></div>
                                                        <!--<div class="nk-tb-col"><span>Date of Birth</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Parent Name</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Mobile Number</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span>Address</span></div>-->
                                                        <div class="nk-tb-col tb-col-md"><span>Action</span></div>
                                                    </div>
                                                    @foreach(allStudents() as $student)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span class="tb-lead"><a href="#">{{ $student->admission_no }}</a></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-lead">{{ $student->fullname}}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub">{{ $student->level->name }}</span>
                                                            </div>
                                                            <!--<div class="nk-tb-col">
                                                                <span class="tb-sub">{{ "" /*$student->dob*/ }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ "" /*isset($student->guardian->fullname)?$student->guardian->fullname:'No Guardian Yet'*/ }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ "" /*isset($student->guardian->phone)?$student->guardian->phone:'No Guardian Phone Number Yet' */}}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                            <span class="tb-sub">{{ "" /*$student->address*/ }}</span>
                                                            </div>-->
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">
                                                                    <a href="{{ route('view-result',$student->id) }}" class="btn btn-sm btn-success"><em class="icon ni ni-list"></em>Result</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div><!-- .card -->
                                        </div>
                                    </div><!-- .row -->
                                    @endguardian

                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@endsection
