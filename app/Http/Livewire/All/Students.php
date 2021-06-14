<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Promotion;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class Students extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedStudents = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $student_id;

    public $searchString = "";
    protected $listeners = ['refreshStudents' => '$refresh'];

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedStudents = $this->students->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selectedStudents = [];
        }
    }
    /**
     * update the checked value
     */
    public function updatedChecked()
    {
        $this->checkedAll = false;
    }
    /**
     * get all students from database
     */
    public function getStudentsProperty()
    {
        $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles[0] == 'Admin') {
            return Student::with(['level', 'user', 'state', 'lga'])->search(trim($this->searchString))->latest()->paginate(10);
        } elseif ($userRoles[0] == 'Teacher') {
            $level_id = auth()->user()->teacher->level_id;
            return Student::with(['level', 'user', 'state', 'lga'])
                ->where('level_id', $level_id)->latest()->paginate(10);
        }
    }
    /**
     *  delete mutiple records
     */
    public function deleteRecords()
    {

        DB::beginTransaction();

        try {
            $student = Student::whereKey($this->checked)->delete();
            User::whereKey('id', $student->user_id)->delete();
            $this->checked = [];
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }
    /**
     * download excel file
     */
    public function exportBulkStudents()
    {
        return Excel::download(new StudentExport(), 'bulk-student-upload.xlsx');
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($student_id)
    {
        DB::beginTransaction();

        try {
            $student = Student::findOrFail($student_id);
            User::where('id', $student->user_id)->delete();
            $student->delete();
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }
    /**
     * edit record
     */
    public function editStudent($id)
    {
        $this->emit('editForm', $id);
    }
    /**
     * student promotion
     */
    public function promoteStudent($id)
    {
        $data = Student::findOrFail($id);
        $current_level = $data->level_id;
        $promote = Promotion::create([
            'student_id' => $data->student_id,
            'from' => $current_level,
            'to'  => $current_level + 1,
            'section_id' => activeSectionId(),
            'teacher_id' => auth()->user()->teacher->teacher_id
        ]);
        if ($promote) {
            $update = $data->update([
                'level_id' => $data->level_id + 1
            ]);
        }
        session()->flash('success', 'Student have been promoted successfully');
    }

    public function promoteMultiStudents()
    {
        $data = Student::whereKey($this->checked)->get();
        foreach ($data as $key) {
            $current_level = $key->level_id;
            $promote = Promotion::create([
                'student_id' => $key->student_id,
                'from' => $current_level,
                'to'  => $current_level + 1,
                'section_id' => activeSectionId(),
                'teacher_id' => auth()->user()->teacher->teacher_id
            ]);
            if ($promote) {
                $update = $data->update([
                    'level_id' => $key->level_id + 1
                ]);
            }
        }
        session()->flash('success', 'Students have been promoted successfully');
    }
    /**
     * render the students livewire view
     */
    public function render()
    {

        //dd($this->students);
        return view('livewire.all.students', [
            'students' =>  Student::all()
        ])->extends('layouts.app')->section('content');
    }
}
