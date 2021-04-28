<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Admin;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Admins extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedAdmins = [];
    public $selectAll = false;
    public $searchString = "";

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedAdmins = $this->admins->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
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
     * get all from database
     */
    public function getAdminsProperty()
    {
        return Admin::with(['user'])->search(trim($this->searchString))->latest()->paginate(5);
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($admin_id)
    {

        DB::beginTransaction();

        try {
            $admin = Admin::findOrFail($admin_id);
            User::where('id', $admin->user_id)->delete();
            $admin->delete();
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }
    /**
     * edit  record
     */
    public function editAdmin($id)
    {
        $this->emit('editForm', $id);
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        return view('livewire.all.admins', [
            'admins' => $this->admins
        ])->extends('layouts.app')->section('content');
    }
}
