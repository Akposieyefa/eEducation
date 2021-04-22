<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;

class Notifications extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedNotifications = [];
    public $selectAll = false;
    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            //$this->selectedNotifications = $this->notifications->pluck('id')->map(fn($item) => (string) $item)->toArray();
        } else {
            $this->selectedNotifications = [];
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
    public function getNotificationsProperty()
    {
        $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles == "Admin") {
            return Notification::with(['role'])->latest()->paginate(3);
        } else {
            return Notification::with(['role'])->where('role_id', auth()->user()->roles[0]['name'])->latest()->paginate(3);
        }
    }
    /**
     * render the notifications livewire view
     */
    public function render()
    {
        return view('livewire.all.notifications', [
            'notifications' => $this->notifications
        ])->extends('layouts.app')->section('content');
    }
}
