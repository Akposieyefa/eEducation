<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Result as SubjectResult;
use App\Imports\SubjectResultSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subject;
use App\Models\Term;
use App\Models\Level;
use App\Models\Student;
use Livewire\WithFileUploads;
use App\Imports\SubjectResultUpdate;
use Illuminate\Support\Facades\DB;

class Result extends Component
{
    use WithFileUploads;

    public $subjects;
    public $terms;
    public $levels;

    public $term;
    public $resultSheet;
    public $subject_id;
    public $level_id;

    public function mount()
    {
        //$this->subjects = auth()->user()->teacher->level->subjects;
        $this->subjects = Subject::all();
        $this->terms = Term::where('status', 'open')->get();
        $this->levels = Level::all();
    }


    public function submit()
    {

        $this->validate([
            'resultSheet' => 'required',
            'term' => 'required',
            'subject_id' => 'required',
            'level_id' => 'required',
        ]);

        if (!empty($this->resultSheet)) {
            //$level = auth()->user()->teacher->level_id;

            session()->flash('info', 'Please wait...');

            $import = new SubjectResultSheet($this->term, $this->subject_id, $this->level_id);
            Excel::import($import, $this->resultSheet);

            $records = $import->data;
            $error = '';
            $counter = 1;

            DB::beginTransaction();

            try {

                for ($i = 1; $i < count($records); $i++) {
                    $student = Student::where(['admission_no' => $records[$i][0]])->get();

                    if (count($student) > 0) {
                        $student_id = $student[0]['student_id'];
                        $resultCheck = SubjectResult::where(['student_id' => $student_id, 'subject_id' => $this->subject_id, 'term_id' => $this->term, 'level_id' => $this->level_id])->get();
                        if (count($resultCheck) > 0) {
                            //dd('fgdfhdfhfdh');
                            DB::table('results')->where('student_id', $student_id)->update([
                                'ca_score'    =>  $records[$i][1],
                                'exam_score'    =>  $records[$i][2],
                            ]);
                        } else {

                            $result_row =  new SubjectResult;

                            $result_row->student_id = $student_id;
                            $result_row->ca_score    =  $records[$i][1];
                            $result_row->exam_score    =  $records[$i][2];
                            $result_row->term_id = $this->term;
                            $result_row->subject_id = $this->subject_id;
                            $result_row->level_id = $this->level_id;

                            $result_row->save();
                            $counter++;
                        }
                    } else {
                        //session()->flash('error', 'No Record found for student  ' . $records[$i][0] . '');
                        //return  'No Record found for student  ' . $records[$i][0] . '';
                        $error =  'No Record found for student  ' . $records[$i][0];
                        session()->flash('errMsg', '' . $error);
                        break;
                    }
                }

                DB::commit();

                if ($counter == count($records)) {
                    session()->flash('success', 'Result uploaded successfully');
                } else {
                }
            } catch (\Throwable $e) {
                DB::rollBack();
                session()->flash('errMsg', 'Error! Result upload failed. Try again');
            }

            Session::forget('info');


            /*try {
                $level = $this->level_id;
                $result = new SubjectResultSheet($this->term, $this->subject_id, $level);
                //dd('ok');
                $res = Excel::import($result, $this->resultSheet);
                //dd($res);
                dd($res);
                if ($res == 'ok') {
                    session()->flash('error', '' . $result[1]);
                } else {
                    session()->flash('success', 'Result uploaded successfully');
                }
            } catch (Exception $e) {
                dd('Error occured');
            }*/
        }
    }

    public function render()
    {
        return view('livewire.modals.result')->extends('layouts.app')->section('content');
    }
}
