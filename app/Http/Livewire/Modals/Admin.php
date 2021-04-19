<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Admin as AdminData;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use App\Models\Role;
use App\Models\User;

class Admin extends Component
{
    use WithFileUploads;

    public $isCreateAdminOpen = false;
    public $update_mode = false;
    public $profile_mood = false;
    public $modal_id;

    public $fname;
    public $mname;
    public $lname;
    public $gender;
    public $address;
    public $phone;
    public $passport;
    public $email;
    public $adminId;

    protected $listeners = [
        'showFormAdminModal' => 'open',
        'closeFormAdminModal' => 'close',
        'editForm' =>  'editForm',
        'showProfile' => 'showProfile'
    ];
    protected $queryString = ['isCreateAdminOpen'];

    protected $rules = [
       'fname' => 'required',
       'mname' => 'string|max:255|nullable',
       'lname' => 'required',
       'email' => 'required|email|unique:users',
       'phone' => 'required',
       'gender' => 'required',
    ];
        /**
     * display edit form
     */
    public function editForm($id)
    {
        $this->adminId = $id;
        $this->update_mode = true;
        $admin = AdminData::with(['user'])->where('id', $this->adminId)->first();
        $this->fname = $admin->fname;
        $this->mname = $admin->mname;
        $this->lname = $admin->lname;
        $this->phone  = $admin->dob;
        $this->address = $admin->address;
        $this->email = $admin->user->email;
        $this->passport = $admin->passport;
        $this->isCreateAdminOpen  = true;

    }
    /**
     * update admin details
     */
    public function updateAdmin()
    {
        $this->validate();
        $admin = AdminData::find($this->adminId);
        $admin->update([
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address
        ]);
        if ($admin) {
            $user = User::where('id', $admin->user_id)->update([
                'email' => $this->email
            ]);
            session()->flash('success', 'Administrator profile updated successfully');
        }else {
            session()->flash('errMsg', 'Sorry an error occured');
        }
        $this->update_mode = false;
        $this->close();
    }
    /**
     * submit form data
     */
    public function submit()
    {
        $this->validate();
        $imageHasName; //local variable

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
                $image = $manager->make('storage/passports/'.$imageHasName)->resize(300, 200);
                $image->save('storage/passports_thumb/'.$imageHasName);
            }

            $user = User::create([
                'email' => $this->email,
                'password' => Hash::make('password'),
            ]);
            $role = Role::where('name', "Admin",)->first();
            $user->roles()->attach($role->id);

            $admin = AdminData::create([
                'user_id' => $user->id,
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'gender' => $this->gender,
                'phone' => $this->phone,
                'address' => $this->address,
                'passport' => $imageHasName
            ]);

            DB::commit();

            if ($admin) {
                session()->flash('success', 'Administrator profile created successfully');
            }else {
                User::where('id', $user->id)->forceDelete();
                session()->flash('errMsg', 'Sorry an error occured');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('errMsg', 'Sorry an error occured. Try again');
        }

    }
    /**
     * open form modal
     */
    public function open($id = null)
    {
        $this->model_id = $id;
        $this->isCreateAdminOpen = true;
    }
    /**
     * close form modal
     */
    public function close()
    {
        $this->model_id = '';
        $this->isCreateAdminOpen = false;
        $this->update_mode = false;
        $this->profile_mood = false;
        $fname = "";
        $mname = "";
        $lname = "";
        $gender = "";
        $address = "";
        $phone = "";
        $passport = "";
        $email = "";
    }
    public function render()
    {
        return view('livewire.modals.admin');
    }
}
