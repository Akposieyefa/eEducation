<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Level;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use App\Models\Term;

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
        $classes = Level::all();
        return view('dashboard', compact('classes'));
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
    public function viewResult()
    {
        $id = auth()->user()->student->id;

        $student = Student::findOrFail($id);
        $sessions = Section::all();
        $terms = Term::all();
        $level = auth()->user()->level_id;

        return view('view_result', compact('student', 'sessions', 'terms', 'level'));
    }

    public function getStudentResult(Request $request)
    {
        $id = auth()->user()->student->id;

        $student = Student::findOrFail($id);
        $results = Result::where('student_id', $student->student_id)->where('session_id', $request->session)->where('term_id', $request->term)->get();
        if (count($results) > 0) {
            return view('my_result', compact('results', 'student'));
        } else {
            return redirect()->back()->withErrors(['Sorry! Result for the selected session and term is not yet uploaded', 'The Message']);
        }
    }

    public function viewStudentResult($id)
    {
        $student = Student::findOrFail($id);
        $results = Result::where('student_id', $student->student_id)->where('term_id', activeTermId())->get();
        return view('view_result', compact('results', 'student'));
    }
}
