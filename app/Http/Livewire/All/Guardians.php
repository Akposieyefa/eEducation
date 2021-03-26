<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Guardian;
use Livewire\WithPagination;

class Guardians extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedGuardians = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedGuardians = $this->guardians->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
            $this->selectedGuardians = [];
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
     * get all guardians from database
     */
    public function getGuardiansProperty()
    {
        return Arm::with(['level','students'])->latest()->paginate(3);
    }
    

    public function render()
    {
        return view('livewire.all.guardians',[
            'guardians' => $this->guardians
        ])->extends('layouts.app')->section('content');
    }
}
