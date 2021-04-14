<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\User;
use Auth;

class Students extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedStudents = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $student_id;

    protected $listeners = ['refreshStudents' => '$refresh'];

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedStudents = $this->students->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
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
            return Student::with(['level','user','state','lga'])->latest()->paginate(10);
        }elseif($userRoles[0] == 'Teacher'){
            $level_id = auth()->user()->teacher->level_id;
            return Student::with(['level','user','state','lga'])
                    ->where('level_id', $level_id)->latest()->paginate(10);
        }
    }
    /**
     *  delete mutiple records
     */
    public function deleteRecords()
    {
        $student = Student::whereKey($this->checked)->delete();
        User::whereKey('id', $student->user_id)->delete();
        $this->checked = []; 
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($student_id)
    {
        $student = Student::findOrFail($student_id);
        User::where('id', $student->user_id)->delete();
        $student->delete();
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
        $data->update(
            [
                'level_id' => $data->level_id +1
            ]
        );
        session()->flash('success', 'Student have been promoted successfully');
    }
    /**
     * render the students livewire view
     */
    public function render()
    {
        return view('livewire.all.students', [
            'students' =>  $this->students
        ])->extends('layouts.app')->section('content');
    } 

}
