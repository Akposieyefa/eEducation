<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Payment;
use App\Models\Student;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function feesPayment()
    {
        return view('fees_payment');
    }

    /**
     * View current result
     */
    public function viewResult($id)
    {
        $student = Student::findOrFail($id);
        $results = Result::where('student_id', $student->student_id)->where('term_id',activeTermId())->get();
        return view('view_result', compact('results','student'));
    }
}
