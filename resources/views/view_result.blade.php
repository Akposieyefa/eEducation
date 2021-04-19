@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                        <div class="invoice">
                                            <div class="invoice-action">
                                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="html/subscription/invoice-print.html" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                                            </div><!-- .invoice-actions -->
                                            <div class="invoice-wrap">
                                                <div class="invoice-brand text-center" style="border:0px solid red;">
                                                    <img src="{{ asset('assets/result-logo.png') }}" srcset="{{ asset('assets/result-logo.png') }}" alt="" style="width:100%; height:auto; min-height:200px">
                                                </div>
                                                <div class="invoice-head mt-5">
                                                    <div class="invoice-contact">
                                                        <span class="overline-title"></span>
                                                        <div class="invoice-contact-info">
                                                            <h4 class="title">Name: &nbsp;&nbsp; <u>Gregory Anderson</u></h4>
                                                            <h4 class="title">Class: &nbsp;&nbsp; <u>Junior Arabic and Islamic School 1 (JAIS 1)</u></h4>
                                                            <h4 class="title">Position: &nbsp;&nbsp; <u>1st</u></h4>
                                                            <!--<ul class="list-plain">
                                                                <li><em class="icon ni ni-map-pin-fill"></em><span>House #65, 4328 Marion Street<br>Newbury, VT 05051</span></li>
                                                                <li><em class="icon ni ni-call-fill"></em><span>+012 8764 556</span></li>
                                                            </ul>-->
                                                        </div>
                                                    </div>
                                                    <div class="invoice-contact">
                                                        <div class="invoice-contact-info">
                                                            <h4 class="title">ADM. No.: &nbsp;&nbsp; <u>2018ASIAZ144NPS</u></h4>
                                                            <h4 class="title">Term/Session: &nbsp;&nbsp; <u>1st Term  -  2020/2021</u></h4>
                                                            <h4 class="title">Out of: &nbsp;&nbsp; <u>34</u></h4>
                                                            <!--<ul class="list-plain">
                                                                <li><em class="icon ni ni-map-pin-fill"></em><span>House #65, 4328 Marion Street<br>Newbury, VT 05051</span></li>
                                                                <li><em class="icon ni ni-call-fill"></em><span>+012 8764 556</span></li>
                                                            </ul>-->
                                                        </div>
                                                    </div>
                                                </div><!-- .invoice-head -->
                                                <div class="invoice-head mt-3 mb-3 row">
                                                    <div class="invoice-contact col-12">   
                                                        <h2 class=" text-center text-bold" style="color:red;"><u>Cognitive Domain (Academic Report) &nbsp;&nbsp; كشف الدرجات</u></h2>
                                                    </div>
                                                </div>
                                                <div class="invoice-bills">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr style="border-top:1px solid !important;">
                                                                    <th style="padding:10px; text-align:center"><h2>Subjects</h2></th>
                                                                    <th><h4>C.A</h4></th>
                                                                    <th><h4>Exams</h4></th>
                                                                    <th><h4>Total</h4></th>
                                                                    <th><h4>Grade</h4></th>
                                                                    <th><h4>Teacher's Name</h4></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-left">
                                                                <tr>
                                                                    <td>AL-QUR’AAN</td>
                                                                    <td>20</td>
                                                                    <td>0</td>
                                                                    <td>20</td>
                                                                    <td>F</td>
                                                                    <td rowspan="5" style="writing-mode: tb-rl; transform: rotate(-180deg); font-size:1.5em; font-weight:700; padding-left:7%; text-align:center"> USMAN IDRISH Shehu Abdullahi</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>HADEETH</td>
                                                                    <td>34</td>
                                                                    <td>40</td>
                                                                    <td>64</td>
                                                                    <td class="text-left">B</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>AZKAAR</td>
                                                                    <td>16</td>
                                                                    <td>30</td>
                                                                    <td>46</td>
                                                                    <td class="text-left">D</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ARABIYYAH</td>
                                                                    <td>15</td>
                                                                    <td>55</td>
                                                                    <td>70</td>
                                                                    <td class="text-left">A</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>MA’ALUMATUL-AMAH</td>
                                                                    <td>28</td>
                                                                    <td>40</td>
                                                                    <td>68</td>
                                                                    <td class="text-left">A</td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="2" style="vertical-align: bottom !important;"><h4>TOTAL MARKS: &nbsp;&nbsp; <span>907</span> </h4></td>
                                                                    <td colspan="2"><h4>MARKS OBTAINED: &nbsp;&nbsp; <span>460</span></h4> </td>
                                                                    <td colspan="2"><h4>AVERAGE: &nbsp;&nbsp; <span>56.7</span> </h4></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style="vertical-align: bottom !important; text-align:center"><h4 class="text-warning mb-2 mt-2">Next Term Begins: 4th January, 2021 and Ends: 16th December,2021 </h4></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style="vertical-align: bottom !important; text-align:center" class="pt-3 pb-3">&nbsp;&nbsp;</td>
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
                                                                </tr>-->
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
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div class="nk-notes ff-italic fs-15px text-soft; text-center"> <span style="color:red;font-weight:700;font-size:1.5em">OUR MISSION :</span> To Develop, Educate and Train Future Leaders who are Righteous, Kind-Hearted and Altruistic under the Spirit of Islaamic Culture and Philosophy </div>
                                                    </div>
                                                </div><!-- .invoice-bills -->
                                            </div><!-- .invoice-wrap -->
                                        </div><!-- .invoice -->
                                    </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@endsection
