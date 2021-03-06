<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Arm as ArmData;
use App\Models\Level;

class Arm extends Component
{
    public $classes;

    public $isCreateArmOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $level_id;
    public $name;

    protected $listeners = [
        'showFormArmModal' => 'open',
        'closeFormArmModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isCreateArmOpen'];

    protected $rules = [
        'level_id' => 'required',
        'name' => 'required'
    ];
    /**
     * works like the __construct() function 
     */
    public function mount()
    {
        $this->classes = Level::all();
    }
    /**
     * submit fomr data
     */
    public function submit()
    {
        $this->validate();
         $arm = ArmData::create([
             'level_id' => $this->level_id,
             'name' => $this->name
         ]);
         if ($arm) {
             session()->flash('success', 'Class arm created successfully');
         }else {
             session()->flash('errMsg', 'Sorry an error occured');
         }
    }
    /**
     * open form modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isCreateArmOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isCreateArmOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
    }

    public function render()
    {
        return view('livewire.modals.arm');
    }
}
