<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Term;
use Livewire\WithPagination;

class Terms extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedTerms = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            //$this->selectedTerms = $this->terms->pluck('id')->map(fn($item) => (string) $item)->toArray();
        } else {
            $this->selectedTerms = [];
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
    public function getTermsProperty()
    {
        return Term::with(['section'])->latest()->paginate(3);
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        return view('livewire.all.terms', [
            'terms' => $this->terms
        ])->extends('layouts.app')->section('content');
    }
}
