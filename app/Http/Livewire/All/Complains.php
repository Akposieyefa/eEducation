<?php

namespace App\Http\Livewire\All;

use Livewire\WithPagination;
use App\Models\Complain;

use Livewire\Component;

class Complains extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedComplains = [];
    public $selectAll = false;
    public $searchString;
    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedComplains = $this->complains->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selectedComplains = [];
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
     * get all complains from database
     */
    public function getComplainsProperty()
    {
        return Complain::with(['user'])->latest()->paginate(3);
    }
    public function render()
    {
        return view('livewire.all.complains', [
            'complains' => $this->complains
        ])->extends('layouts.app')->section('content');
    }
}
