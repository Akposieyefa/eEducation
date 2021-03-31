<?php 
use App\Models\Notification;
use App\Models\Complain;
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
              return auth()->user()->teacher->profileimage;
        }elseif($role == "Admin") {
              return auth()->user()->admin->profileimage;
        }elseif($role == "Guardian") {
               return auth()->user()->guardian->profileimage;
        }else {
               return auth()->user()->student->profileimage;
        }

}