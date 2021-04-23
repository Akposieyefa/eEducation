<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Subject as SubjectData;
use Session;

class Subject extends Component
{
    public $isSubjectOpen = false;
    public $update_mode = false;
    public $modal_id;

    public $name;

    protected $listeners = [
        'showFormSubjectModal' => 'open',
        'closeFormSubjectModal' => 'close',
        'editForm' =>  'editForm',
    ];

    protected $queryString = ['isSubjectOpen'];

    /**
     * opens the form
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isSubjectOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isSubjectOpen = false;
        $this->update_mode = false;
        $this->name = "";
        return redirect()->to('/subjects');
    }
    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate([
            'name' => 'required'
        ]);
        SubjectData::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Subject successfully');
        $this->close();
    }
    public function render()
    {
        return view('livewire.modals.subject');
    }

    public function deleteSubject($id)
    {
        Subject::where('id', $id)->delete();
    }
}
