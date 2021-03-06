<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Complain as ComplainData;
use Illuminate\Support\Facades\Mail;
use App\Mail\Complain as ComplainNotify;
use Session;

class Complain extends Component
{
    public $roles;
    public $isComplainOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $role_id;
    public $title;
    public $body;

    protected $listeners = [
        'showFormComplainModal' => 'open',
        'closeFormComplainModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];

    protected $queryString = ['isComplainOpen'];

    protected $rules = [
        'title' => 'required',
        'body' => 'required'
    ];
    /**
     * opens the notification form
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isComplainOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isComplainOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        $this->title = "";
        $this->body = "";
        return redirect()->to('/complains');
    }
    /**
     * submit form data
     */
    public function submit()
    {

        $this->validate();

        session()->flash('info', 'Please wait...');

        $email = auth()->user()->email;

        ComplainData::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'body' => htmlentities($this->body)
        ]);

        $data = array(
            'name' =>  auth()->user()->fname,
            'title' => $this->title,
            'body' => $this->body,
            'email' => $email
        );
        //Mail::to($email)->send(new ComplainNotify($data));
        session()->flash('success', 'Thanks your complain have been sent successfully');
        Session::forget('info');
        $this->close();
    }
    public function render()
    {
        return view('livewire.modals.complain');
    }
}
