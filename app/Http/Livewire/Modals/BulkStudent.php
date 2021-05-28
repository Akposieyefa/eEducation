<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Level;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Role;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;
use Session;

class BulkStudent extends Component
{
    use WithFileUploads;

    public $levels;

    public $studentSheet;
    public $level_id;

    public function mount()
    {
        $this->levels = Level::all();
    }

    public function submit_2()
    {
        $this->validate([
            'studentSheet' => 'required',
            'level_id' => 'required'
        ]);

        session()->flash('info', 'Please wait...');

        if (!empty($this->studentSheet)) {
            $student = new StudentImport($this->level_id);
            Excel::import($student, $this->studentSheet);
            session()->flash('success', 'Student records uploaded successfully');
        }
        Session::forget('info');
    }

    public function submit()
    {
        session()->forget('info_status');
        session()->forget('errMsg');
        session()->forget('success');

        $this->validate([
            'studentSheet' => 'required',
            'level_id' => 'required'
        ]);

        if (!empty($this->studentSheet)) {
            //$level = auth()->user()->teacher->level_id;

            $students = new StudentImport($this->level_id);
            Excel::import($students, $this->studentSheet);

            $records = $students->data;
            $counter = 1;

            //dd(count($records));

            DB::beginTransaction();

            try {

                session()->flash('info_status', 'Please wait...');

                for ($i = 1; $i < count($records); $i++) {

                    $admission_no = $records[$i][1];
                    $studentCheck = Student::where(['admission_no' => $admission_no])->get();
                    if (count($studentCheck) > 0) {
                        //dd('fgdfhdfhfdh');
                        DB::table('students')->where('admission_no', $admission_no)->update([
                            'fname'    =>  $records[$i][0],
                        ]);
                    } else {

                        if (strlen($admission_no) > 3) {
                            $user =  User::create([
                                'email' =>  $records[$i][1],
                                'password' => Hash::make($admission_no),
                            ]);

                            $role = Role::where('name', "Student",)->first();
                            $user->roles()->attach($role->id);

                            $student = Student::create([
                                'user_id' => $user->id,
                                'student_id' => Helpers::customIDGenerator(new Student, 'student_id', 5, 'STD'),
                                'fname' => $records[$i][0],
                                'level_id' => $this->level_id,
                                'admission_no' => $admission_no
                            ]);

                            $counter++;
                        }
                    }
                }

                DB::commit();
                session()->forget('info_status');
                session()->forget('errMsg');
                session()->flash('success', 'Students uploaded Successfully');
            } catch (\Throwable $e) {
                DB::rollBack();
                //dd('failed - ' . $e);
                session()->forget('info_status');
                session()->forget('success');
                session()->flash('errMsg', 'Error! Student upload failed. Try again');
            }
            //return 'last';

        } else {
            session()->flash('errMsg', 'Error! Please select a file to upload');
        }
    }

    public function render()
    {
        return view('livewire.modals.bulk-student')->extends('layouts.app')->section('content');
    }
}
