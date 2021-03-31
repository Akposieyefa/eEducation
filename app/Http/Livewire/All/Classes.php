<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Level;
use Livewire\WithPagination;

class Classes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedClasses = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedClasses = $this->classes->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
            $this->selectedClasses = [];
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
     * get all classes from database
     */
    public function getClassesProperty()
    {
        return Level::with(['students','subjects'])->latest()->paginate(10);
    }
    public function render()
    {
        return view('livewire.all.classes',[
            'classes' => $this->classes
        ])->extends('layouts.app')->section('content');
    }
}
