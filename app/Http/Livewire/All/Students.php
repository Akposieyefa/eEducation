<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class Students extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedStudents = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $student_id;

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
        return Student::with(['level','user','state','lga'])->latest()->paginate(2);
    }
    /**
     *  delete mutiple students records
     */
    public function deleteRecords()
    {
        $student = Student::whereKey($this->checked)->delete();
        $this->checked = []; 
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();
    }
    /**
     * edit student record
     */
    public function editStudent($id)
    {
        $this->emit('editForm', $id);
    }
    /**
     * render the students livewire view
     */
    public function render()
    {
        $this->bulkDisabled = count($this->selectedStudents) < 1;
        return view('livewire.all.students', [
            'students' =>  $this->students
        ])->extends('layouts.app')->section('content');
    } 

}
