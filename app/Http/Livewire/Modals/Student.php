<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;
use App\Models\Student as StudentData;
use App\Models\State;
use App\Models\Lga;
use App\Models\Level;
use App\Models\Arm;
use App\Models\User;
use App\Models\Role;
use Intervention\Image\ImageManager;

class Student extends Component
{
    use WithFileUploads;

    public $states;
    public $lgas;
    public $levels;
    public $arms;
    
    public $selectedState = NULL;
    public $selectedClass = NULL;

    public $isStudentOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $fname;
    public $mname;
    public $lname;
    public $dob;
    public $nationality;
    public $address;
    public $selectedLga;
    public $selectedArm;
    public $email;
    public $gender;
    public $passport;
    public $studentId;

    protected $listeners = [
        'showFormStudentModal' => 'open',
        'closeFormStudentModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isStudentOpen'];

    protected $rules = [
        'fname' => 'required',
        'mname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:users',
        'dob' => 'required',
        'nationality' => 'required',
        'address' => 'required',
        'selectedLga' => 'required',
        'selectedArm' => 'required',
        'selectedState' => 'required',
        'selectedClass' => 'required',
        'gender' => 'required',
    ];
    /**
     * display edit form 
     */
    public function editForm($id)
    {
        $this->studentId = $id;
        $this->update_mode = true;
        $student = StudentData::with(['user','level','arm','lga'])->where('id', $this->studentId)->first();
        $this->fname = $student->fname;
        $this->mname = $student->mname;
        $this->lname = $student->lname;
        $this->dob   = $student->dob;
        $this->nationality = $student->nationality;
        $this->address = $student->address;
        $this->email = $student->user->email;
        $this->gender = $student->gender;
        $this->selectedState = $student->state_id;
        $this->selectedClass = $student->level_id;    
        $this->selectedLga = $student->lga_id;
        $this->selectedArm = $student->arm_id;
        $this->passport = $student->passport;
        $this->isStudentOpen  = true;
    }
    /**
     * update student details
     */
    public function updateStudent()
    {
        $this->validate();
        $student = StudentData::find($this->studentId);
        $student->update([
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'address' => $this->address,
            'state_id' => $this->selectedState,
            'lga_id' => $this->selectedLga,
            'level_id' => $this->selectedClass,
            'arm_id' => $this->selectedArm
        ]);
        if ($student) {
            $user = User::where('id', $student->user_id)->update([
                'name' => $this->fname,
                'email' => $this->email
            ]);
            session()->flash('success', 'Student profile updated successfully');
        }else {
            session()->flash('errMsg', 'Sorry an error occured');
        }
        $this->update_mode = false;
        $this->close();
    }
    /**
     * works like the __construct() function 
     */
    public function mount()
    {
        $this->states = State::all();
        $this->lgas = collect();
        $this->levels = Level::all();
        $this->arms = collect();
    }
    /**
     * open modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isStudentOpen = true;
    }
    /**
     * Lifecycle Hooks for selectedState drop down
     */
    public function updatedSelectedState($state) 
    {
        $this->lgas = Lga::where('state_id', $state)->get();
    }
    /**
     * Lifecycle Hooks for selectedClass drop down
     */
    public function updatedSelectedClass($class) 
    {
        $this->arms = Arm::where('level_id', $class)->get();
    }
    /**
     * close student modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isStudentOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        $this->fname = "";
        $this->mname = "";
        $this->lname = "";
        $this->dob = "";
        $this->nationality = "";
        $this->address = "";
        $this->selectedLga = "";
        $this->selectedArm = "";
        $this->selectedClass = "";
        $this->selectedState = "";
        $this->email = "";
        $this->passport = "";
    }
    /**
     * submit student form
     */
    public function submit()
    {
       $this->validate();
       $imageHasName;//local variable
       $t=time(); //local variable

        if (!empty($this->passport)) {
            $imageHasName = $this->passport->hashName();

            $validate = array_merge($this->validate(), [
                'passport' => 'image'
            ]);
            $this->passport->store('public/passports');

            $manager = new ImageManager();
            $image = $manager->make('storage/passports/'.$imageHasName)->resize(300, 200);
            $image->save('storage/passports_thumb/'.$imageHasName);
        }

        $user = User::create([
            'name' => $this->fname,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);
        $role = Role::where('name', "Student",)->first();
        $user->roles()->attach($role->id);

        $student = StudentData::create([
            'user_id' => $user->id,
            'student_id' => Helpers::customIDGenerator(new StudentData, 'student_id', 5, 'STD'),
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'address' => $this->address,
            'state_id' => $this->selectedState,
            'lga_id' => $this->selectedLga,
            'level_id' => $this->selectedClass,
            'arm_id' => $this->selectedArm,
            'addmited_date' => date("Y-m-d",$t),
            'passport' => $imageHasName
        ]);
        if ($student) {
            session()->flash('success', 'Student profile created successfully');
        }else {
            User::where('id', $user->id)->delete();
            session()->flash('errMsg', 'Unable to register student');
        }
    }

    public function render()
    {
        return view('livewire.modals.student');
    }
}
