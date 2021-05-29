<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Models\Guardian as GuardianData;
use App\Models\Role;
use App\Models\User;
use App\Models\GuardainStudent;
use Intervention\Image\ImageManager;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Session;

class Guardian extends Component
{
    use WithFileUploads;

    public $isGuardianOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $fname;
    public $mname = NULL;
    public $lname;
    public $occupation;
    public $email;
    public $gender;
    public $passport = NULL;
    public $phone;
    public $home_address;
    public $office_address = NULL;
    public $guardianId;
    public $student_id = NULL;

    protected $listeners = [
        'showFormGuardianModal' => 'open',
        'closeFormGuardianModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isGuardianOpen'];

    protected $rules = [
        'fname' => 'required',
        'mname' => 'nullable|string|max:255',
        'lname' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required',
        'home_address' => 'required',
        'office_address' => 'nullable|string|max:255',
        'gender' => 'required',
        'occupation' => 'required',

    ];
    /**
     * display edit form 
     */
    public function editForm($id)
    {
        $this->guardianId = $id;
        $this->update_mode = true;
        $guardian = GuardianData::with(['user', 'students'])->where('id', $this->guardianId)->first();
        $this->fname = $guardian->fname;
        $this->mname = $guardian->mname;
        $this->lname = $guardian->lname;
        $this->occupation = $guardian->occupation;
        $this->home_address = $guardian->home_address;
        $this->office_address = $guardian->office_address;
        $this->email = $guardian->user->email;
        $this->gender = $guardian->gender;
        $this->passport = $guardian->passport;
        $this->phone = $guardian->phone;
        $this->isGuardianOpen  = true;
    }
    /**
     * update guardian details
     */
    public function updateGuardian()
    {
        DB::beginTransaction();

        try {
            $guardian = GuardianData::find($this->studentId);

            $this->validate([
                'email' => 'required|email|unique:users,email,' . $guardian->user_id,
            ]);

            session()->flash('info', 'Please wait...');

            $guardian->update([
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'occupation' => $this->occupation,
                'home_address' => $this->home_address,
                'office_address' => $this->office_address,
                'phone' => $this->phone
            ]);
            if ($guardian) {
                $user = User::where('id', $guardian->user_id)->update([
                    'email' => $this->email
                ]);

                DB::commit();
                session()->flash('success', 'Guardian profile updated successfully');

                $this->update_mode = false;
                $this->close();
            } else {
                session()->flash('errMsg', 'Sorry an error occured');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again');
        }

        Session::forget('info');
    }
    /**
     * open modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isGuardianOpen = true;
    }
    /**
     * close guardian modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isGuardianOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        $this->fname = "";
        $this->mname = "";
        $this->lname = "";
        $this->occupation = "";
        $this->home_address = "";
        $this->office_address = "";
        $this->email = "";
        $this->gender = "";
        $this->passport = "";
        $this->phone = "";
        return redirect()->to('/guardians');
    }
    /**
     * submit guardian form
     */
    public function submit()
    {
        $this->validate();
        $imageHasName = NULL; //local variable

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

            $user = User::create([
                'email' => $this->email,
                'password' => Hash::make('password'),
            ]);
            $role = Role::where('name', "Guardian")->first();
            $user->roles()->attach($role->id);

            $guardian = GuardianData::create([
                'user_id' => $user->id,
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'email' => $this->email,
                'occupation' => $this->occupation,
                'gender' => $this->gender,
                'phone' => $this->phone,
                'home_address' => $this->home_address,
                'office_address' => $this->office_address,
                'passport' => $imageHasName
            ]);



            if ($guardian) {
                $student = Student::where('admission_no', $this->student_id)->update([
                    'guardian_id' => $guardian->id
                ]);
                DB::commit();
                session()->flash('success', 'Guardian profile created successfully');
                $this->close();
            } else {
                User::where('id', $user->id)->forceDelete();
                session()->flash('errMsg', 'Sorry an error occured');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again');
        }

        Session::forget('info');
    }

    public function render()
    {
        return view('livewire.modals.guardian');
    }
}
