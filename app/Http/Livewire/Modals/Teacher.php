<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher as TeacherData;
use App\Models\State;
use App\Models\Lga;
use App\Models\Level;
use App\Models\Arm;
use App\Models\User;
use App\Models\Role;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class Teacher extends Component
{
    use WithFileUploads;

    public $states;
    public $lgas;
    public $levels;
    public $arms;

    public $selectedState = NULL;
    public $selectedClass = NULL;

    public $isTeacherOpen = false;
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
    public $resume;
    public $employment_date;

    protected $listeners = [
        'showFormTeacherModal' => 'open',
        'closeFormTeacherModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isTeacherOpen'];

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
        'employment_date' => 'required',
        'resume' => 'required'
    ];

    public function mount()
    {
        $this->states = State::all();
        $this->lgas = collect();
        $this->levels = Level::all();
        $this->arms = collect();
    }

    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isTeacherOpen = true;
    }

    public function updatedSelectedState($state) 
    {
        $this->lgas = Lga::where('state_id', $state)->get();
    }

    public function updatedSelectedClass($class) 
    {
        $this->arms = Arm::where('level_id', $class)->get();
    }

    public function submit()
    {
        $this->validate();
        $imageHasName;//local variable
        $t=time(); //local variable
 
         if (!empty($this->passport) && !empty($this->resume)) {
             $imageHasName = $this->passport->hashName();
 
             $validate = array_merge($this->validate(), [
                 'passport' => 'image',
             ]);
             $this->passport->store('public/passports');
             $manager = new ImageManager();
             $image = $manager->make('storage/passports/'.$imageHasName)->resize(300, 200);
             $image->save('storage/passports_thumb/'.$imageHasName);
             //reume
             $this->resume->store('public/resume');
             $filenameWithExt = $this->resume->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
             $extension = $this->resume->getClientOriginalExtension();
             $fileNameToStore = $filename  .'_'.time().'.'.$extension;
             $path = $this->resume->storeAs('public/resume', $fileNameToStore);
         }
 
         $user = User::create([
             'name' => $this->fname,
             'email' => $this->email,
             'password' => Hash::make('password'),
         ]);
         $role = Role::where('name', "Teacher",)->first();
         $user->roles()->attach($role->id);
 
         $teacher = TeacherData::create([
             'user_id' => $user->id,
             'teacher_id' => Helpers::customIDGenerator(new TeacherData, 'teacher_id', 5, 'NHS'),
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
             'employment_date' => $this->employment_date,
             'passport' => $imageHasName,
             'resume' => $fileNameToStore
         ]);
         if ($teacher) {
             session()->flash('success', 'Teacher profile created successfully');
         }else {
             User::where('id', $user->id)->delete();
             session()->flash('errMsg', 'Unable to register teacher');
         }
    }
    public function close()
    {
        $this->model_id = '';
        $this->isTeacherOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
    }

    public function render()
    {
        return view('livewire.modals.teacher');
    }
}
