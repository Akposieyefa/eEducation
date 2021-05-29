<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Student;

class Guardians extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedGuardians = [];
    public $selectAll = false;
    public $searchString = "";
    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedGuardians = $this->guardians->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
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
        DB::beginTransaction();

        try {
            $guardian = Guardian::whereKey($this->checked)->delete();
            User::whereKey('id', $guardian->user_id)->delete();
            $this->checked = [];
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($guardian_id)
    {
        DB::beginTransaction();

        try {
            $guardian = Guardian::findOrFail($guardian_id);
            User::where('id', $guardian->user_id)->delete();
            $guardian->delete();
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }
    /**
     * get all guardians from database
     */
    public function getGuardiansProperty()
    {
       
        return Guardian::with(['user'])->search(trim($this->searchString))->latest()->paginate(10);
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
        return view('livewire.all.guardians', [
            'guardians' => $this->guardians
        ])->extends('layouts.app')->section('content');
    }
}
