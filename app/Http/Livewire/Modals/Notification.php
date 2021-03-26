<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Role;
use App\Models\Notification as Notify;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification as MailNotification;

class Notification extends Component
{
    public $roles;
    public $isNotificationOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $role_id;
    public $title;
    public $body;

    protected $listeners = [
        'showFormNotificationModal' => 'open',
        'closeFormStudentModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];

    protected $queryString = ['isNotificationOpen'];

    protected $rules = [
        'role_id' => 'required',
        'title' => 'required',
        'body' => 'required'
    ];

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isNotificationOpen = true;
    }

    public function close()
    {
        $this->model_id = '';
        $this->isNotificationOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        $this->title = "";
        $this->body = "";
        $this->role_id = "";
    }

    public function submit()
    {
        $this->validate();
        Notify::create([
            'role_id' => $this->role_id,
            'title' => $this->title,
            'body' => $this->body
        ]);
        $users = User::whereHas('roles', function($q) {
            $q->where('name', $this->role_id);
        })->get();
        foreach ($users as $user) {
            $data = array(
                'title' => $this->title,
                'body' => $this->body,
                'name' => $value->name
            );
            Mail::to($user->email)->send(new MailNotification($data));
        }
        session()->flash('success', 'Notification sent successfully');
        $this->close();
    }

    public function render()
    {
        return view('livewire.modals.notification');
    }
}
