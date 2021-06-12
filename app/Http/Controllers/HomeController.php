<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Level;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use App\Models\Payment as PaymentData;
use App\Models\Term;
use App\Models\Guardian;
use App\Models\State;
use App\Models\Lga;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $is_fees_paid = 0;
        $is_result_ready = 0;
        if (auth()->user()->roles[0]['name'] == 'Student') {
            $fee_paid = PaymentData::where('student_id', auth()->user()->student->student_id)->where('term_id', activeTermId())->where('session_id', activeSectionId())->where('status', '1')->first();

            if ($fee_paid) {
                $is_fees_paid = '1';
            }

            $results = DB::table('results')
                ->join('subjects', 'subjects.id', '=', 'results.subject_id')
                ->where('results.student_id', '=', auth()->user()->student->student_id)
                ->where('results.session_id', '=', activeSectionId())
                ->where('results.term_id', '=', activeTermId())
                ->select('*')
                ->orderBy('subjects.name', 'ASC')
                ->get();
            //dd($results);

            if (count($results) > 0) {
                $is_result_ready = 1;
            }
        }

        return view('dashboard', compact('classes', 'is_fees_paid', 'is_result_ready'));
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
        //$results = Result::where('student_id', $student->student_id)->where('session_id', $request->session)->where('term_id', $request->term)->get();
        $results = DB::table('results')
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->where('results.student_id', '=', $student->student_id)
            ->where('results.session_id', '=', $request->session)
            ->where('results.term_id', '=', $request->term)
            ->select('*')
            ->orderBy('subjects.name', 'ASC')
            ->get();
        //dd($results);

        if (count($results) > 0) {
            return view('my_result', compact('results', 'student', 'request'));
        } else {
            return redirect()->back()->withErrors(['Sorry! Result for the selected session and term is not yet uploaded', 'The Message']);
        }
    }

    public function getStudentGuardian()
    {
        $id = auth()->user()->student->id;

        $student = Student::findOrFail($id);
        $guardian = Guardian::where('user_id', auth()->user()->id)->get();
        if (count($guardian) > 0) {
            $guardian = $guardian[0];
        } else {
            $guardian = new Guardian;
        }

        return view('student_guardian', compact('guardian'));
    }

    public function saveStudentGuardian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|min:3',
            'mname' => 'nullable|string',
            'lname' => 'required|string|min:3',
            'gender' => 'required|string|min:3',
            'occupation' => 'required|string|min:3',
            'phone' => 'required|string|min:3',
            'email' => 'required|string|min:3',
            'home_address' => 'required|string|min:3',
            'office_address' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Please fill in required fields']);
        }

        $user = Guardian::updateOrCreate(
            [
                'user_id' =>  auth()->user()->id
            ],
            [
                'user_id' =>  auth()->user()->id,
                'fname' =>  request('fname'),
                'mname' =>  request('mname'),
                'lname' =>  request('lname'),
                'gender' =>  request('gender'),
                'occupation' =>  request('occupation'),
                'phone' =>  request('phone'),
                'email' =>  request('email'),
                'home_address' =>  request('home_address'),
                'office_address' =>  request('office_address')
            ],
        );

        if ($user) {
            return json_encode(array('status' => 'success', 'message' => 'Guardian Details Successfully Saved'));
        } else {
            return json_encode(array('status' => 'error', 'message' => $user));
        }
    }

    public function getStudentProfile()
    {
        $id = auth()->user()->id;

        $student = Student::where('user_id', $id)->get();
        $states = State::orderBy('name')->get();
        $lgas = Lga::orderBy('name')->get();
        if (count($student) > 0) {
            $student = $student[0];
        } else {
            $student = new Student;
        }

        return view('student_profile', compact('student', 'states', 'lgas'));
    }

    public function saveStudentProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|min:3',
            'dob' => 'required|string',
            'nationality' => 'required|string|min:3',
            'gender' => 'required|string|min:3',
            'state_id' => 'required|integer',
            'lga_id' => 'required|integer',
            'address' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Please fill in all fields']);
        }

        $user = Student::updateOrCreate(
            [
                'user_id' =>  auth()->user()->id
            ],
            [
                'user_id' =>  auth()->user()->id,
                'fname' =>  request('fname'),
                'dob' =>  request('dob'),
                'nationality' =>  request('nationality'),
                'gender' =>  request('gender'),
                'state_id' =>  request('state_id'),
                'lga_id' =>  request('lga_id'),
                'address' =>  request('address')
            ],
        );

        if ($user) {
            return json_encode(array('status' => 'success', 'message' => 'Details Successfully Saved'));
        } else {
            return json_encode(array('status' => 'error', 'message' => $user));
        }
    }

    public function getStaffProfile()
    {
        $id = auth()->user()->id;

        $staff = Teacher::where('user_id', $id)->get();
        $states = State::orderBy('name')->get();
        $lgas = Lga::orderBy('name')->get();
        if (count($staff) > 0) {
            $staff = $staff[0];
        } else {
            $staff = new Teacher;
        }

        return view('staff_profile', compact('staff', 'states', 'lgas'));
    }

    public function saveStaffProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|min:3',
            'mname' => 'nullable|string',
            'lname' => 'required|string|min:3',
            'dob' => 'required|string',
            'employment_date' => 'required|string',
            'nationality' => 'required|string|min:3',
            'gender' => 'required|string|min:3',
            'state_id' => 'required|integer',
            'lga_id' => 'required|integer',
            'address' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error',  'Please fill in all fields']);
        }

        $user = Teacher::updateOrCreate(
            [
                'user_id' =>  auth()->user()->id
            ],
            [
                'user_id' =>  auth()->user()->id,
                'fname' =>  request('fname'),
                'mname' =>  request('mname'),
                'lname' =>  request('lname'),
                'dob' =>  request('dob'),
                'employment_date' =>  request('employment_date'),
                'nationality' =>  request('nationality'),
                'gender' =>  request('gender'),
                'state_id' =>  request('state_id'),
                'lga_id' =>  request('lga_id'),
                'address' =>  request('address')
            ],
        );

        if ($user) {
            return json_encode(array('status' => 'success', 'message' => 'Details Successfully Saved'));
        } else {
            return json_encode(array('status' => 'error', 'message' => $user));
        }
    }

    public function adminViewResult()
    {
        $sessions = Section::all();
        $terms = Term::all();
        $levels = Level::all();

        return view('admin_view_result', compact('sessions', 'terms', 'levels'));
    }

    public function adminGetStudentResult(Request $request)
    {
        //$results = Result::where('student_id', $student->student_id)->where('session_id', $request->session)->where('term_id', $request->term)->get();

        $results = DB::table('results')
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->join('students', 'students.student_id', '=', 'results.student_id')
            ->join('levels', 'levels.id', '=', 'results.level_id')
            ->where('results.session_id', '=', $request->session)
            ->where('results.term_id', '=', $request->term)
            ->where('results.level_id', '=', $request->level)
            ->select('*')
            ->orderBy('students.fname', 'ASC')
            ->get();

        //dd($results);

        if (count($results) > 0) {
            return view('admin_result', compact('results', 'request'));
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

    public function getStaffPayslip()
    {
        return view('payslip');
    }

    public function viewPayslip(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|min:3',
            'mname' => 'nullable|string',
            'lname' => 'required|string|min:3',
            'dob' => 'required|string',
            'employment_date' => 'required|string',
            'nationality' => 'required|string|min:3',
            'gender' => 'required|string|min:3',
            'state_id' => 'required|integer',
            'lga_id' => 'required|integer',
            'address' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error',  'message' => 'Please fill in all fields.']);
        }

        $user = Teacher::updateOrCreate(
            [
                'user_id' =>  auth()->user()->id
            ],
            [
                'user_id' =>  auth()->user()->id,
                'fname' =>  request('fname'),
                'mname' =>  request('mname'),
                'lname' =>  request('lname'),
                'dob' =>  request('dob'),
                'employment_date' =>  request('employment_date'),
                'nationality' =>  request('nationality'),
                'gender' =>  request('gender'),
                'state_id' =>  request('state_id'),
                'lga_id' =>  request('lga_id'),
                'address' =>  request('address')
            ],
        );

        if ($user) {
            return json_encode(array('status' => 'success', 'message' => 'Details Successfully Saved'));
        } else {
            return json_encode(array('status' => 'error', 'message' => $user));
        }
    }
}
