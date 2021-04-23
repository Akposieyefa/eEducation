@extends('layouts.app')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="#" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                        </div><!-- .invoice-actions -->
                        <div class="invoice-wrap">
                            <div class="invoice-brand text-center" style="border:0px solid red;">
                                <img src="{{ asset('assets/result-logo.png') }}" srcset="{{ asset('assets/images/result-logo.png') }}" alt="" style="width:100%; height:auto; min-height:200px">
                            </div>
                            <div class="invoice-head mt-5">
                                <div class="invoice-contact">
                                    <span class="overline-title"></span>
                                    <div class="invoice-contact-info">
                                        <h4 class="title">ADM. No.: &nbsp;&nbsp; <u>{{ $student->admission_no }}</u></h4>
                                        <h4 class="title">Name: &nbsp;&nbsp; <u>{{ $student->fullname }}</u></h4>
                                        <h4 class="title">Class: &nbsp;&nbsp; <u>{{ $student->level->name }}</u></h4>
                                        <h4 class="title">Position: &nbsp;&nbsp; <u>{{ getStudentPosition($student->student_id, $student->level->id, activeTermId()) }}</u> &nbsp;&nbsp; Out of: &nbsp;&nbsp; <u>{{ subjectStudentCount($student->level->id) }}</u></h4>
                                        <h4 class="title">Term/Session: &nbsp;&nbsp; <u>{{ activeTerm() }} - {{ activeSection() }}</u></h4>
                                        <!--<ul class="list-plain">
                                                                    <li><em class="icon ni ni-map-pin-fill"></em><span>House #65, 4328 Marion Street<br>Newbury, VT 05051</span></li>
                                                                    <li><em class="icon ni ni-call-fill"></em><span>+012 8764 556</span></li>
                                                                </ul>-->
                                    </div>
                                </div>
                            </div><!-- .invoice-head -->
                            <div class="invoice-head mt-3 mb-3 row">
                                <div class="invoice-contact col-12">
                                    <h4 class=" text-center text-bold" style="color:red;"><u>Cognitive Domain (Academic Report) &nbsp;&nbsp; كشف الدرجات</u></h4>
                                </div>
                            </div>
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr style="border-top:1px solid !important;">
                                                <th style="padding:10px; text-align:center">
                                                    <h4>Subjects</h4>
                                                </th>
                                                <th>
                                                    <h5>C.A</h5>
                                                </th>
                                                <th>
                                                    <h5>Exams</h5>
                                                </th>
                                                <th>
                                                    <h5>Total</h5>
                                                </th>
                                                <th>
                                                    <h5>Grade</h5>
                                                </th>
                                                <th>
                                                    <h5>Remarks</h5>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            @php
                                            $total_marks = 0;
                                            $marks_obtained = 0;
                                            $average = 0;
                                            $total_students = 0;
                                            $counter = 0;
                                            @endphp
                                            @foreach ($results as $result)
                                            @php
                                            $counter += 1;
                                            $totalscore = $result->ca_score + $result->exam_score;
                                            $marks_obtained += $totalscore;
                                            @endphp
                                            <tr>
                                                <td>{{ $result->subject->name }}</td>
                                                <td>{{ $result->ca_score }}</td>
                                                <td>{{ $result->exam_score }}</td>
                                                <td>{{ $result->ca_score + $result->exam_score }}</td>
                                                <td>{{ myGrades( $totalscore ) }}</td>
                                                <td>{{ myGradesRemark( $totalscore ) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" style="vertical-align: bottom !important;">
                                                    <h5>TOTAL MARKS: &nbsp;&nbsp; <span>{{ $counter * 100 }}</span> </h5>
                                                </td>
                                                <td colspan="2">
                                                    <h5>MARKS OBTAINED: &nbsp;&nbsp; <span>{{ $marks_obtained }}</span></h5>
                                                </td>
                                                <td colspan="2">
                                                    <h5>AVERAGE: &nbsp;&nbsp; <span>{{ $marks_obtained / $counter  }}</span> </h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="vertical-align: bottom !important; text-align:center">
                                                    <h5 class="text-warning mb-2 mt-2">Next Term Begins: 4th January, 2021 and Ends: 16th December,2021 </h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="vertical-align: bottom !important; text-align:center" class="pt-3 pb-3">&nbsp;&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="vertical-align: bottom !important; text-align:center;" class="pt-2 pb-2 fs-17px">
                                                    Headmaster’s Comment: &nbsp;&nbsp; PROMOTED
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="6" style="vertical-align: bottom !important; text-align:center" class="pt-3 pb-3">&nbsp;&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style=" padding-top:2%; padding-right:5%; text-align:center">
                                                    <img src="{{ asset('assets/images/stamp.png') }}" style="margin:auto !important;" />
                                                </td>
                                            </tr>

                                            <!--<tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Processing fee</td>
                                                                        <td>$10.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">TAX</td>
                                                                        <td>$43.50</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Grand Total</td>
                                                                        <td>$478.50</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="vertical-align: bottom !important; text-align:left; border:0px" class="pt-5 pb-2 fs-17px">
                                                                            Class Master’s Comment: &nbsp;&nbsp; GOOD PERFORMANCE, you can do better next term!
                                                                        </td>
                                                                        <td rowspan="3" style="border:0px; padding-top:2%; padding-right:5%;">
                                                                            <img src="{{ asset('assets/stamp.png') }}" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="vertical-align: bottom !important; text-align:left; border:0px" class="pt-2 pb-2 fs-17px">
                                                                            Headmaster’s Comment: &nbsp;&nbsp; PROMOTED TO NURSERY TWO
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" style="vertical-align: bottom !important; text-align:left; border:0px" class="pt-2 pb-5 fs-17px">
                                                                            Signature and Date: &nbsp;&nbsp; 4th January, 2021
                                                                        </td>
                                                                    </tr>-->
                                        </tfoot>
                                    </table>
                                    <!--<div class="nk-notes ff-italic fs-15px text-soft; text-center"> 
                                                                <span style="color:red;font-weight:700;font-size:1.5em">OUR MISSION :</span> 
                                                                To Develop, Educate and Train Future Leaders who are Righteous, Kind-Hearted and 
                                                                Altruistic under the Spirit of Islaamic Culture and Philosophy 
                                                            </div>-->
                                </div>
                            </div><!-- .invoice-bills -->
                        </div><!-- .invoice-wrap -->
                    </div><!-- .invoice -->
                </div><!-- .nk-block -->
            </div><!-- .invoice -->
        </div><!-- .nk-block -->
    </div>
</div>
</div>
</div>
<!-- content @e -->
@endsection