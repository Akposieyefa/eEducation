@extends('layouts.app')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="invoice" id="print_div">
                        <style>
                            @media print {
                                .pagebreak {
                                    clear: both;
                                    page-break-after: always;
                                }
                            }
                        </style>
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="javascript:void(0)" onclick="PrintElem('print_div')"><em class="icon ni ni-printer-fill"></em></a>
                        </div>
                        {{-- dd($results) --}}
                        @foreach ($results as $result)     
                            @php
                                $student_results =  DB::table('results')
                                                            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
                                                            ->where('results.student_id', '=', $result->student_id)
                                                            ->where('results.session_id', '=', $request->session)
                                                            ->where('results.term_id', '=', $request->term)
                                                            ->where('results.level_id', '=', $request->level)
                                                            ->select('*')
                                                            ->orderBy('subjects.name', 'ASC')
                                                            ->get();
                            @endphp
                            <div class="invoice-wrap">
                                <h4 style="text-align:center; color:#1C501C;"><em>DAARUL HADEETHIS SALAFIYYAH NIGERIA</em></h4>
                                <h5 style="text-align:center; color:#3797DE;">{{ strtoupper($result->unit) }}</h5>
                                <table style="width:100%">
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; width:25%;"><img src="{{ asset('assets/images/dhsn.png') }}" srcset="{{ asset('assets/images/dhsn.png') }}" alt="" style="width:70%; height:70%"></td>
                                        
                                        <td style="width:50%">  
                                            <div>
                                                <h6 style="text-align:center; color:#061E52;">Reg. No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>{{ $result->admission_no }}</u></h6>
                                                <h6 style="text-align:center; color:#061E52;">Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>{{ $result->fname }}</u></h6>
                                                <h6 style="text-align:center; color:#061E52;">Class:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>{{ $result->name }}</u></h6>
                                                <h6 style="text-align:center; color:#061E52;">Position:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>{{ getStudentPosition($result->student_id, $request->level, $request->term, $request->session) }}</u> &nbsp;&nbsp; Out of: &nbsp;&nbsp; <u>{{ subjectStudentCount($request->level) }}</u></h6>
                                                <h6 style="text-align:center; color:#061E52;">Term/Session:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>{{ activeTerm($request->term) }} - {{ activeSection($request->session) }}</u></h6>
                                            </div>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; width:25%;"><img src="{{ asset('assets/images/no-photo.png') }}" srcset="{{ asset('assets/images/no-photo.png') }}" alt="" style="width:60%; height:60%"></td>
                                    </tr>
                                </table><hr />
                                <h6 style="text-align:center; color:#ff2500;"><em>End of Term Student's Report Sheet</em></h6>
                            
                                <div class="invoice-bills">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr style="border-top:1px solid !important;">
                                                    <th style="padding:10px; text-align:center">
                                                        <h6>Subjects</h6>
                                                    </th>
                                                    <th>
                                                        <h6>C.A (40%)</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Exams (60%)</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Total (100%)</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Grade</h6>
                                                    </th>
                                                    <th>
                                                        <h6>Remarks</h6>
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
                                                @foreach ($student_results as $student_result)
                                                    @php
                                                        $counter += 1;
                                                        $totalscore = $student_result->ca_score + $student_result->exam_score;
                                                        $marks_obtained += $totalscore;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $student_result->name }}</td>
                                                        <td>{{ $student_result->ca_score }}</td>
                                                        <td>{{ $student_result->exam_score }}</td>
                                                        <td>{{ $student_result->ca_score + $student_result->exam_score }}</td>
                                                        <td>{{ myGrades( $totalscore ) }}</td>
                                                        <td>{{ myGradesRemark( $totalscore ) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2" style="vertical-align: bottom !important;">
                                                        <h6>TOTAL MARKS: &nbsp;&nbsp; <span>{{ $counter * 100 }}</span> </h6>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6>MARKS OBTAINED: &nbsp;&nbsp; <span>{{ $marks_obtained }}</span></h6>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6>AVERAGE: &nbsp;&nbsp; <span>{{ round ( ($marks_obtained / $counter), 2)  }}</span> </h6>
                                                    </td>
                                                </tr>
                                                <!-- tr>
                                                    <td colspan="6" style="vertical-align: bottom !important; text-align:center">
                                                        <h6 class="text-warning mb-2 mt-2">Next Term Begins: 4th January, 2021 and Ends: 16th December,2021 </h6>
                                                    </td>
                                                </tr -->
                                            
                                                <tr>
                                                    <td colspan="6" style="vertical-align: bottom !important; text-align:center;" class="pt-2 pb-2 fs-17px">
                                                        Headmaster's/Principal's Remarks:
                                                    </td>
                                                </tr>

                                            
                                                <!-- tr>
                                                    <td colspan="6" style=" padding-top:2%; padding-right:5%; text-align:center">
                                                        <img src="{{ asset('assets/images/stamp.png') }}" style="margin:auto !important;" />
                                                    </td>
                                                </tr -->

                                            </tfoot>
                                        </table>
                                    </div>
                                </div><!-- .invoice-bills -->
                            </div><!-- .invoice-wrap -->
                        @endforeach
                        <div class="pagebreak"></div>
                    </div><!-- .invoice -->
                    
                </div><!-- .nk-block -->
            </div><!-- .invoice -->
        </div><!-- .nk-block -->
    </div>
</div>
</div>
</div>
<script>
    function PrintElem(elem)
    {
        var mywindow = window.open('', 'PRINT', 'height=500,width=1200');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).outerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
        
        setTimeout(function() {
            mywindow.print();
            mywindow.close();
        }, 100);

        return true;
    }
</script>
<!-- content @e -->
@endsection