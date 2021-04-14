<?php 
use App\Models\Notification;
use App\Models\Complain;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Role;
use App\Models\Section;
use App\Models\Term;

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

function studentCount(){
       $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles[0] == 'Admin') {
             return Student::count();
        }elseif($userRoles[0] == 'Teacher'){
            $level_id = auth()->user()->teacher->level_id;
            $arm_id = auth()->user()->teacher->arm_id;
            return Student::where('level_id', $level_id)
                    ->where('arm_id', $arm_id)->count();
        }
}
function teacherCount(){
       return Teacher::count(); 
}
function allStudents() {

       $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles[0] == 'Admin') {
            return Student::with(['level','user','state','lga','guardian'])->latest()->paginate(10);
        }elseif($userRoles[0] == 'Teacher'){
            $level_id = auth()->user()->teacher->level_id;
            return Student::with(['level','user','state','lga','guardian'])
                    ->where('level_id', $level_id)->latest()->paginate(10);
        }elseif($userRoles[0] == 'Guardian') {
              $guardian_id = auth()->user()->guardian->level_id;
              return Student::with(['level','user','state','lga','guardian'])
                      ->where('guardian_id',  $guardian_id)->latest()->paginate(10);
        }
}

function subjectCount(){
       return Subject::count(); 
}

function activeSection(){
      $sections = Section::where('status', 'open')->get();
      foreach($sections as $section){
       return $name = $section->name;
      }
}

function activeTerm(){
       $terms = Term::where('status', 'open')->get();
      foreach($terms as $term){
       return $name = $term->name;
      }
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