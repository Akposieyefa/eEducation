<?php

namespace App\Http\Livewire\All;

use Livewire\Component;
use App\Models\Subject;
use App\Exports\SubjectResultSheet;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Subjects extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $selectedSubjects = [];
    public $selectAll = false;
    public $searchString = "";

    /**
     * update the select all value
     */
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedSubjects = $this->subjects->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selectedSubjects = [];
        }
    }
    /**
     * update the checked value
     */
    public function updatedChecked()
    {
        $this->checkedAll = false;
    }
    /**
     * get all from database
     */
    public function getSubjectsProperty()
    {
        $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles[0] == 'Admin') {
            return Subject::with('level')->search(trim($this->searchString))->latest()->paginate(10);
        } elseif ($userRoles[0] == 'Teacher') {
            //return auth()->user()->teacher->level->subjects;
            return Subject::all();
        }
    }

    public function deleteRecords()
    {

        DB::beginTransaction();

        try {
            $subject = Subject::whereKey($this->checked)->delete();
            $this->checked = [];
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }
    /**
     * delete single record
     */
    public function deleteSingleRecord($subject_id)
    {

        DB::beginTransaction();

        try {
            $subject = Subject::findOrFail($subject_id);
            $subject->delete();
            DB::commit();
        } catch (\Throwable $e) {
            //dd($e);
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ');
        }
    }

    /**
     * download excel file
     */
    public function exportStudents()
    {
        $level = auth()->user()->teacher->level_id;
        return Excel::download(new SubjectResultSheet($level), 'result-sheet.xlsx');
    }
    /**
     * render the livewire view
     */
    public function render()
    {
        $subjects = DB::table('subjects')->orderByRaw('name ASC')->paginate();
        return view('livewire.all.subjects', [
            'subjects' => $subjects
        ])->extends('layouts.app')->section('content');
    }
}
