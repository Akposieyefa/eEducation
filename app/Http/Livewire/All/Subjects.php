<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Subject;
use Livewire\WithPagination;

class Subjects extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedSubjects = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedSubjects = $this->subjects->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
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
     * get all subjects from database
     */
    public function getSubjectsProperty()
    {
        return Subject::latest()->paginate(10);
    }
    /**
     * render the subjects livewire view
     */
    public function render()
    {
        return view('livewire.all.subjects', [
            'subjects' => $this->subjects
        ])->extends('layouts.app')->section('content');
    }
}
