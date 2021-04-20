<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Result as SubjectResult;
use App\Imports\SubjectResultSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subject;
use App\Models\Term;
use App\Models\Level;
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
        $this->subjects = auth()->user()->teacher->level->subjects;
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
            $level = $this->level_id;
            $result = new SubjectResultSheet($this->term, $this->subject_id, $level);
            Excel::import($result, $this->resultSheet);
            session()->flash('success', 'Result uploaded successfully');
        }
    }

    public function render()
    {
        return view('livewire.modals.result')->extends('layouts.app')->section('content');
    }
}
