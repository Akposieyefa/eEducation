<?php 
use App\Models\Notification;
use App\Models\Complain;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Admin;
use Carbon\Carbon;

function notification() {
       return $message = Notification::whereDate(
            'created_at', Carbon::today()
       )->get();
}

function complains() {
       return  $complain = Complain::where(
             'status', NULL
       )->get();
}

function username($role) {
       
       if($role == "Teacher"){
              return auth()->user()->teacher->fullname;
       }elseif($role == "Admin") {
              return auth()->user()->admin->fullname;
       }elseif($role == "Guardian") {
              return auth()->user()->guardian->fullname;
       }else {
              return auth()->user()->student->fullname;
       }
}

function userimage($role) {

       if($role == "Teacher"){
              return auth()->user()->email;
        }elseif($role == "Admin") {
              return auth()->user()->admin->profileimage;
        }elseif($role == "Guardian") {
               return auth()->user()->email;
        }else {
               return auth()->user()->student->profileimage;
        }

}