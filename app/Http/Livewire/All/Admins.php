<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Admin;
use Livewire\WithPagination;

class Admins extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedAdmins = [];
    public $selectAll = false;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedAdmins = $this->admins->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
            $this->selectedAdmins = [];
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
     * get all admins from database
     */
    public function getAdminsProperty()
    {
        return Admin::with(['user'])->latest()->paginate(3);
    }
    
    public function render()
    {
        return view('livewire.all.admins',[
            'admins' => $this->admins
        ])->extends('layouts.app')->section('content');
    }
}
