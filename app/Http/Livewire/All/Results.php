<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Result;
use Livewire\WithPagination;


class Results extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedResults = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedResults = $this->results->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selectedResults = [];
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
    public function getResultsProperty()
    {
        return Result::with(['student', 'subject', 'level'])->latest()->paginate(30);
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        return view('livewire.all.results', [
            'results' => $this->results
        ])->extends('layouts.app')->section('content');
    }
}
