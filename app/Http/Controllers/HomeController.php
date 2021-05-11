<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Level;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $searchString = "";

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

    public function addUnit()
    {
        $units = DB::table('units')->select('*')->get();
        return view('add_unit', compact('units'));
    }

    public function createUnit(Request $request)
    {
        if (strlen($request->unit_name) > 2) {
            $res = DB::insert('insert into units (name) values (?)', [ucwords($request->unit_name)]);

            //dd($res);

            if ($res) {
                return redirect()->back()->with('message', 'Unit Successfully Added!');
            } else {
                return redirect()->back()->withErrors(['Error! Request not Completed.']);
            }
        } else {
            return redirect()->back()->withErrors(['Error! Please type in a valid unit name']);
        }
    }

    public function editUnit(Request $request)
    {
        if (strlen($request->unitname) > 2) {
            $res = DB::update('update units set name = ? where id = ?', [ucwords($request->unitname), $request->unitid]);

            //dd($res);

            if ($res > 0) {
                return redirect()->back()->with('message', 'Unit Successfully Updated!');
            } else {
                return redirect()->back()->withErrors(['Error! Request not Completed.']);
            }
        } else {
            return redirect()->back()->withErrors(['Error! Request Declined']);
        }
    }

    public function deleteUnit(Request $request)
    {
        if ($request->unitid > 0) {
            $res = DB::delete('delete from units where id = ?', [$request->unitid]);

            //dd($res);

            if ($res > 0) {
                return redirect()->back()->with('message', 'Unit Successfully Deleted!');
            } else {
                return redirect()->back()->withErrors(['Error! Request not Completed.']);
            }
        } else {
            return redirect()->back()->withErrors(['Error! Request Declined']);
        }
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
            return view('my_result', compact('results', 'student', 'request'));
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

    public function getClassesProperty()
    {
        return Level::with(['students', 'subjects'])->search(trim($this->searchString))->latest()->paginate(10);
    }
}
