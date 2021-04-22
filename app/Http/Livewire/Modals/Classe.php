<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Level;

class Classe extends Component
{
    public $isCreateClasseOpen = false;
    public $update_mode = false;
    public $modal_id;

    public $name;

    protected $listeners = [
        'showFormClassModal' => 'open',
        'closeFormClassModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isCreateClasseOpen'];

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
        $this->validate([
            'name' => 'required'
        ]);
        $class = Level::create([
            'name' => $this->name
        ]);
        if ($class) {
            session()->flash('success', 'Class created successfully');
        } else {
            session()->flash('errMsg', 'Sorry an error occured');
        }
    }
    /**
     * open form modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isCreateClasseOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isCreateClasseOpen = false;
        $this->update_mode = false;
        return redirect()->to('/classes');
    }

    public function render()
    {
        return view('livewire.modals.classe');
    }
}
