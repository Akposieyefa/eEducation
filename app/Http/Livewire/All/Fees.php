<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Fee;
use Livewire\WithPagination;


class Fees extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedFees = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            //$this->selectedFees = $this->fees->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selectedFees = [];
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
    public function getFeesProperty()
    {
        return Fee::with(['section', 'term', 'level'])->latest()->paginate(3);
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        return view('livewire.all.fees', [
            'fees' => $this->fees
        ])->extends('layouts.app')->section('content');
    }
}
