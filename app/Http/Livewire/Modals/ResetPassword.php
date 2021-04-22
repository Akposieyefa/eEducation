<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $isPasswordResetOpen = false;
    public $modal_id;

    public $oldpassword;
    public $password;
    public $confirm_password;

    protected $listeners = [
        'showFormPasswordModal' => 'open',
        'closeFormPasswordModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isPasswordResetOpen'];

    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($this->password != $this->confirm_password) {
            session()->flash('errMsg', 'Sorry the password do not match');
        } else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            if (Hash::check($this->oldpassword, $user->password)) {
                $reset = $user->update([
                    'password' => Hash::make($this->password)
                ]);
                if ($reset) {
                    session()->flash('success', 'Password updated successfully');
                } else {
                    session()->flash('errMsg', 'Sorry an error occured');
                }
            }
        }
    }
    /**
     * open form modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isPasswordResetOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isPasswordResetOpen = false;
        return redirect()->to('/teachers');
    }


    public function render()
    {
        return view('livewire.modals.reset-password');
    }
}
