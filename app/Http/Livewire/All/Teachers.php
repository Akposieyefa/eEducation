<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher;
use App\Models\User;

class Teachers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedTeachers = [];
    public $selectAll = false;
    public $bulkDisabled = true;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedTeachers = $this->teachers->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
            $this->selectedTeachers = [];
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
     * get all teachers from database
     */
    public function getTeachersProperty()
    {
        return Teacher::with(['level','user','state','lga'])->latest()->paginate(2);
    }
    /**
     *  delete mutiple teachers records
     */
    public function deleteRecords()
    {
        $teacher = Teacher::whereKey($this->checked)->delete();
        User::whereKey('id', $teacher->user_id)->delete();
        $this->checked = []; 
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($teacher_id)
    {
        $teacher = Teacher::findOrFail($teacher_id);
        User::where('id', $teacher->user_id)->delete();
        $teacher->delete();
    }
    /**
     * edit teacher record
     */
    public function editTeacher($teacher_id)
    {
        $this->emit('editForm', $teacher_id);
    }
    /**
     * render the teachers livewire view
     */
    public function render()
    {
        return view('livewire.all.teachers',[
            'teachers' => $this->teachers
        ])->extends('layouts.app')->section('content');
    }
}
