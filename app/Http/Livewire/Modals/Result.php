<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Reuslt as SubjectResult;
use App\App\Imports\SubjectResultSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subject;
use App\Models\Term;
use Livewire\WithFileUploads;

class Result extends Component
{
    use WithFileUploads;
    
    public $subjects;
    public $terms;

    public $resultSheet;
    public $term;
    public $subject;

    public function mount()
    {
        $this->subjects = auth()->user()->teacher->level->subjects;
        $this->terms = Term::where('status', 'open')->get();
    }

    public function submit()
    {
        $this->validate([
            'resultSheet' => 'required',
            'term' => 'required',
            'subject' => 'required'
        ]);
        if (!empty($this->resultSheet)) {
            $level = auth()->user()->teacher->level_id;
            $result = new SubjectResultSheet($this->term,$this->subjct,$level);
            Excel::import($result,request()->file('file'));            
        }
        session()->flash('success', 'Result uploaded successfully');
    }

    public function render()
    {
        return view('livewire.modals.result')->extends('layouts.app')->section('content');
    }
}
