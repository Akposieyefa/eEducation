<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Fee as FeeData;
use App\Models\Section;
use App\Models\Term;
use App\Models\Level;

class Fee extends Component
{
    public $sections;
    public $terms;
    public $levels;

    public $isCreateFeeOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $selectedSection = NULL;
    public $amount;
    public $selectedTerm;
    public $level_id;

    protected $listeners = [
        'showFormFeeModal' => 'open',
        'closeFormTermModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isCreateFeeOpen'];

    protected $rules = [
        'selectedSection' => 'required',
        'amount' => 'required',
        'level_id' => 'required',
        'selectedTerm' => 'required'
    ];
    /**
     * works like the __construct() function 
     */
    public function mount()
    {
        $this->sections = Section::all();
        $this->levels = Level::all();
    }

    /**
     * Lifecycle Hooks for selectedSection drop down
     */
    public function updatedSelectedSection($section) 
    {
        $this->terms = Term::where('section_id', $section)->get();
    }
    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate();
         $term = FeeData::create([
             'amount' => $this->amount,
             'level_id' => $this->level_id,
             'section_id' => $this->selectedSection,
             'term_id' => $this->selectedTerm
         ]);
         if ($term) {
             session()->flash('success', 'Fess created successfully');
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
        $this->isCreateFeeOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isCreateFeeOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
    }

    public function render()
    {
        return view('livewire.modals.fee');
    }
}
