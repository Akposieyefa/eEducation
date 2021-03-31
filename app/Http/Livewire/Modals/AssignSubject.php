<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Level;
use App\Models\LevelSubject;
use Livewire\WithPagination;

class AssignSubject extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isAssignSubjectOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $level_id;
    public $subject_id = [];

    protected $listeners = [
        'showFormAssignSubjectModal' => 'open',
        'closeFormAssignSubjectModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];

    protected $queryString = ['isAssignSubjectOpen'];
    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate([
            'level_id' => 'required',
            'subject_id' => 'required|array',
          ]);
          
          foreach($this->subject_id as $subject)
          {
            LevelSubject::create([
                  'level_id' => $this->level_id,
                  'subject_id' => $subject,
            ]);
          }
        session()->flash('success', 'Subject assigned to level successfully...!');
    }
    public function render()
    {
        return view('livewire.modals.assign-subject', [
            'levels' => Level::all(),
            'subjects' => Subject::latest()->paginate(10)
        ])->extends('layouts.app')->section('content');
    }
}
