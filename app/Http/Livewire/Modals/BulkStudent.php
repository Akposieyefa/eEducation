<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Level;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

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

    public function submit()
    {
        $this->validate([
            'studentSheet' => 'required',
            'level_id' => 'required'
        ]);
        if (!empty($this->studentSheet)) {
            $student = new StudentImport($this->level_id);
            Excel::import($student,$this->studentSheet);
            session()->flash('success', 'Student records uploaded successfully');
        }
    }
    public function render()
    {
        return view('livewire.modals.bulk-student')->extends('layouts.app')->section('content');
    }
}
