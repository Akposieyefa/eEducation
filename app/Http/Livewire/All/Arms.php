<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Arm;
use Livewire\WithPagination;

class Arms extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedArms = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedArms = $this->arms->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
            $this->selectedArms = [];
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
     * get all arms from database
     */
    public function getArmsProperty()
    {
        return Arm::with(['level','students'])->latest()->paginate(3);
    }
    /**
     * render the arms livewire view
     */
    public function render()
    {
        return view('livewire.all.arms', [
            'arms' => $this->arms
        ])->extends('layouts.app')->section('content');
    }
}
