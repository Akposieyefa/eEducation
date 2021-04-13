<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Guardian;
use App\Models\User;
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
     *  delete mutiple guardians records
     */
    public function deleteRecords()
    {
        $guardian = Guardian::whereKey($this->checked)->delete();
        User::whereKey('id', $guardian->user_id)->delete();
        $this->checked = []; 
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($guardian_id)
    {
        $guardian = Guardian::findOrFail($guardian_id);
        User::where('id', $guardian->user_id)->delete();
        $guardian->delete();
    }
    /**
     * get all guardians from database
     */
    public function getGuardiansProperty()
    {
        return Guardian::with(['user'])->latest()->paginate(3);
    }
    /**
     * edit  record
     */
    public function editGuardian($id)
    {
        $this->emit('editForm', $id);
    }
    /**
     * render the guardians livewire view
     */
    public function render()
    {
        return view('livewire.all.guardians',[
            'guardians' => $this->guardians
        ])->extends('layouts.app')->section('content');
    }
}
