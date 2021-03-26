<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\MailBlast;
use Livewire\WithPagination;

class MailBlasts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedMails = [];
    public $selectAll = false;
    public $bulkDisabled = true;

    /**
     * update the select all value
     */
    public function updatedSelectAll($value) {
        if ($value) {
            $this->selectedMails = $this->mails->pluck('id')->map(fn($item) => (string) $item)->toArray();
        }else{
            $this->selectedMails = [];
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
     * get all notifications from database
     */
    public function getMailsProperty()
    {
        return MailBlast::latest()->paginate(3);
    }

    public function render()
    {
        return view('livewire.all.mail-blasts', [
            'mails' => $this->mails
        ])->extends('layouts.app')->section('content');
    }
}
