<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\MailBlast as Blast;
use App\Mail\MailBlasts;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailBlast extends Component
{

    public $isCreateMailOpen = false;
    public $modal_id;

    public $subject;
    public $message;

    protected $listeners = [
        'showFormMailModal' => 'open',
        'closeFormMailModal' => 'close',
    ];
    protected $queryString = ['isCreateMailOpen'];

    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isCreateMailOpen = true;
    }

    public function submit()
    {
        $this->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        Blast::create([
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        $users = User::all();
        foreach ($users as $user) {
            $data = array(
                'subject' => $this->subject,
                'message' => $this->message,
                'name' => $user->name
            );
            Mail::to($user->email)->send(new MailBlasts($data));
        }
        session()->flash('success', 'Mail sent successfully');
        $this->close();
    }

    public function close()
    {
        $this->model_id = '';
        $this->isCreateMailOpen = false;
    }

    public function render()
    {
        return view('livewire.modals.mail-blast');
    }
}
