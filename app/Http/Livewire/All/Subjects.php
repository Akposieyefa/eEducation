<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Subject;
use App\Exports\SubjectResultSheet;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use App\Models\User;

class Subjects extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedSubjects = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            //$this->selectedSubjects = $this->subjects->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selectedSubjects = [];
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
     * get all from database
     */
    public function getSubjectsProperty()
    {
        $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles[0] == 'Admin') {
            return Subject::latest()->paginate(10);
        } elseif ($userRoles[0] == 'Teacher') {
            return auth()->user()->teacher->level->subjects;
        }
    }

    public function deleteRecords()
    {
        $subject = Subject::whereKey($this->checked)->delete();
        $this->checked = [];
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        $subject->delete();
    }

    /**
     * download excel file
     */
    public function exportStudents()
    {
        $level = auth()->user()->teacher->level_id;
        return Excel::download(new SubjectResultSheet($level), 'result-sheet.xlsx');
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        return view('livewire.all.subjects', [
            'subjects' => $this->subjects
        ])->extends('layouts.app')->section('content');
    }
}
