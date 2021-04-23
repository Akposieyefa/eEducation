<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Section as SectionData;
use Session;

class Section extends Component
{

    public $isCreateSectionOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $name;
    public $start_date;
    public $end_date;
    public $status = 'open';

    protected $listeners = [
        'showFormSectionModal' => 'open',
        'closeFormSectionModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isCreateSectionOpen'];

    protected $rules = [
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];
    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate();

        session()->flash('info', 'Please wait...');

        $section = SectionData::create([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status
        ]);
        if ($section) {
            session()->flash('success', 'Section created successfully');
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
        $this->isCreateSectionOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isCreateSectionOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        return redirect()->to('/sections');
    }

    public function render()
    {
        return view('livewire.modals.section');
    }
}
