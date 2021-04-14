@extends('layouts.app')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card">

                            @admin
                                <x-profiles.admin-profile />
                            @endadmin
                            @student
                                <x-profiles.student-profile />
                            @endstudent
                            @teacher
                                <x-profiles.teacher-profile />
                            @endteacher
                            @guardian
                                <x-profiles.guardian-profile />
                            @endguardian

                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
