<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Term as TermData;
use App\Models\Section;
use Session;

class Term extends Component
{
    public $sections;

    public $isCreateTermOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $section_id;
    public $name;
    public $start_date;
    public $end_date;
    public $status = 'open';

    protected $listeners = [
        'showFormTermModal' => 'open',
        'closeFormTermModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isCreateTermOpen'];

    protected $rules = [
        'section_id' => 'required',
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];
    /**
     * works like the __construct() function 
     */
    public function mount()
    {
        $this->sections = Section::all();
    }
    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate();

        session()->flash('info', 'Please wait...');


        $term = TermData::create([
            'section_id' => $this->section_id,
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status
        ]);
        if ($term) {
            session()->flash('success', 'Term created successfully');
            $this->close();
        } else {
            session()->flash('errMsg', 'Sorry an error occured');
        }

        Session::forget('info');
    }
    /**
     * open form modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isCreateTermOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isCreateTermOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        return redirect()->to('/terms');
    }

    public function render()
    {
        return view('livewire.modals.term');
    }
}
