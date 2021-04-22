<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Section;
use Livewire\WithPagination;

class Sections extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedSections = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            //$this->selectedSections = $this->sections->pluck('id')->map(fn($item) => (string) $item)->toArray();
        } else {
            $this->selectedSections = [];
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
    public function getSectionsProperty()
    {
        return Section::latest()->paginate(3);
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        return view('livewire.all.sections', [
            'sections' => $this->sections
        ])->extends('layouts.app')->section('content');
    }
}
