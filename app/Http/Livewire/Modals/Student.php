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
use App\Models\User;
use App\Models\Role;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;
use Session;

class Student extends Component
{
    use WithFileUploads;

    public $states;
    public $lgas;
    public $levels;

    public $selectedState = NULL;

    public $isStudentOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $admission_no;
    public $fname;
    public $mname = NULL;
    public $lname;
    public $dob;
    public $nationality;
    public $address;
    public $selectedLga;
    public $email = NULL;
    public $gender;
    public $passport = NULL;
    public $studentId;
    public $selectedClass;

    protected $listeners = [
        'showFormStudentModal' => 'open',
        'closeFormStudentModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];

    protected $queryString = ['isStudentOpen'];
    /**
     * display edit form
     */
    public function editForm($id)
    {
        $this->studentId = $id;
        $this->update_mode = true;
        $student = StudentData::with(['user', 'level', 'lga'])->where('id', $this->studentId)->first();
        $this->admission_no = $student->admission_no;
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
        $this->passport = $student->passport;
        $this->isStudentOpen  = true;
    }
    /**
     * update student details
     */
    public function updateStudent()
    {
        $this->validate([
            'admission_no' => 'required',
            'fname' => 'required',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required',
            'email' => 'nullable|email|unique:users',
            'dob' => 'required',
            'nationality' => 'required',
            'address' => 'required',
            'selectedLga' => 'required',
            'selectedState' => 'required',
            'selectedClass' => 'required',
            'gender' => 'required',
        ]);

        session()->flash('info', 'Please wait...');

        $student = StudentData::find($this->studentId);
        $student->update([
            'admission_no' => $this->admission_no,
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'address' => $this->address,
            'state_id' => $this->selectedState,
            'lga_id' => $this->selectedLga,
            'level_id' => $this->selectedClass
        ]);
        if ($student) {
            $user = User::where('id', $student->user_id)->update([
                'email' => $this->email
            ]);
            session()->flash('success', 'Student profile updated successfully');
            $this->update_mode = false;
            $this->close();
        } else {
            session()->flash('errMsg', 'Sorry an error occured');
        }

        Session::forget('info');
    }
    /**
     * works like the __construct() function
     */
    public function mount()
    {
        $this->states = State::all();
        $this->lgas = collect();
        $this->levels = Level::all();
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
        $this->selectedClass = "";
        $this->selectedState = "";
        $this->email = "";
        $this->passport = "";
        return redirect()->to('/students');
    }
    /**
     * submit student form
     */
    public function submit()
    {
        $this->validate([
            'admission_no' => 'required',
            'fname' => 'required',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required',
            'email' => 'nullable|email|unique:users',
            'dob' => 'required',
            'nationality' => 'required',
            'address' => 'required',
            'selectedLga' => 'required',
            'selectedState' => 'required',
            'selectedClass' => 'required',
            'gender' => 'required',
        ]);
        $imageHasName = NULL; //local variable
        $t = time(); //local variable

        session()->flash('info', 'Please wait...');

        DB::beginTransaction();

        try {

            if (!empty($this->passport)) {
                $imageHasName = $this->passport->hashName();

                $validate = array_merge($this->validate(), [
                    'passport' => 'image'
                ]);
                $this->passport->store('public/passports');

                $manager = new ImageManager();
                $image = $manager->make('storage/passports/' . $imageHasName)->resize(300, 200);
                $image->save('storage/passports_thumb/' . $imageHasName);
            }

            $student_id = Helpers::customIDGenerator(new StudentData, 'student_id', 5, 'STD');

            $user = User::create([
                'email' => $student_id,
                'password' => Hash::make('password'),
            ]);

            $role = Role::where('name', "Student",)->first();
            $user->roles()->attach($role->id);

            $student = StudentData::create([
                'user_id' => $user->id,
                'student_id' => $student_id,
                'admission_no' => $this->admission_no,
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
                'addmited_date' => date("Y-m-d", $t),
                'passport' => $imageHasName
            ]);

            DB::commit();

            if ($student) {
                session()->flash('success', 'Student profile created successfully');
                $this->close();
            } else {
                User::where('id', $user->id)->forceDelete();
                session()->flash('errMsg', 'Sorry an error occured');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again ' . $e . '');
        }

        Session::forget('info');
    }

    public function render()
    {
        return view('livewire.modals.student');
    }
}
