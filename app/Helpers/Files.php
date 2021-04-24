<?php

use App\Http\Livewire\Modals\Result;
use App\Models\Notification;
use App\Models\Complain;
use App\Models\Level;
use App\Models\LevelSubject;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Role;
use App\Models\Section;
use App\Models\Term;

function notification()
{
       return $message = Notification::whereDate(
              'created_at',
              Carbon::today()
       )->get();
}

function complains()
{
       return Complain::where('status', NULL)->get();
}

function mycomplains()
{
       $id = auth()->user()->id;
       return Complain::where('user_id', $id)->where('status', NULL)->get();
}

function studentCount()
{
       $userRoles = auth()->user()->roles->pluck('name');
       if ($userRoles[0] == 'Admin') {
              return Student::count();
       } elseif ($userRoles[0] == 'Teacher') {
              $level_id = auth()->user()->teacher->level_id;
              $arm_id = auth()->user()->teacher->arm_id;
              return Student::where('level_id', $level_id)
                     ->where('arm_id', $arm_id)->count();
       }
}

function studentCurrentClass($level_id)
{
       $level = Level::where('id', $level_id)->get();
       if (count($level) > 0) {
              return $level[0]['name'];
       } else {
              return '';
       }
}

function teacherCount()
{
       return Teacher::count();
}
function allStudents()
{

       $userRoles = auth()->user()->roles->pluck('name');
       if ($userRoles[0] == 'Admin') {
              return Student::with(['level', 'user', 'state', 'lga', 'guardian'])->latest()->paginate(10);
       } elseif ($userRoles[0] == 'Teacher') {
              $level_id = auth()->user()->teacher->level_id;
              return Student::with(['level', 'user', 'state', 'lga', 'guardian'])->where('level_id', $level_id)->latest()->paginate(10);
       } elseif ($userRoles[0] == 'Guardian') {
              $guardian_id = auth()->user()->guardian->id;
              return Student::with(['level', 'user', 'state', 'lga', 'guardian'])->where('guardian_id',  $guardian_id)->latest()->paginate(10);
       }
}

function subjectCount()
{
       return Subject::count();
}

function subjectStudentCount($level_id)
{
       return Student::where('level_id', $level_id)->count();
}

function getStudentPosition($student_id, $level_id, $term_id)
{
       $positions = getClassPositions($level_id, $term_id);
       if (is_array($positions)) {
              arsort($positions);
              $cur_position = array_search($student_id, array_keys($positions));
              //dd($cur_position);
              if ($cur_position >= 0 && $cur_position !== false) {
                     return ($cur_position + 1);
              } else {
                     return 0;
              }
       } else {
              return false;
       }
}

function getClassPositions($level_id, $term_id)
{
       $records =  App\Models\Result::where('level_id', '=',  $level_id)->where('term_id', '=', $term_id)->get();
       $positions = array();
       if (count($records) > 0) {


              for ($i = 0; $i < count($records); $i++) {
                     $marks_obtained = 0;
                     $totalscore = $records[$i]['ca_score'] + $records[$i]['exam_score'];
                     $marks_obtained += $totalscore;
                     $positions[$records[$i]['student_id']] = $marks_obtained;
              }

              return $positions;
       }

       return false;
}

function activeSection()
{
       $sections = Section::where('status', 'open')->get();
       foreach ($sections as $section) {
              return $name = $section->name;
       }
}

function activeSectionId()
{
       $sections = Section::where('status', 'open')->get();
       foreach ($sections as $section) {
              return $id = $section->id;
       }
}
function activeTermId()
{
       $terms = Term::where('status', 'open')->get();
       foreach ($terms as $term) {
              return $id = $term->id;
       }
}

function activeTerm()
{
       $terms = Term::where('status', 'open')->get();
       foreach ($terms as $term) {
              return $name = $term->name;
       }
}

function username($role)
{
       if ($role == "Teacher") {
              return auth()->user()->teacher->fullname;
       } elseif ($role == "Admin") {
              return auth()->user()->admin->fullname;
       } elseif ($role == "Guardian") {
              return auth()->user()->guardian->fullname;
       } else {
              return auth()->user()->student->fullname;
       }
}

function userimage($role)
{

       if ($role == "Teacher") {
              return auth()->user()->teacher->profileimage;
       } elseif ($role == "Admin") {
              return auth()->user()->admin->profileimage;
       } elseif ($role == "Guardian") {
              return auth()->user()->guardian->profileimage;
       } else {
              return auth()->user()->student->profileimage;
       }
}

function myGrades($score)
{
       //Display the result
       if ($score >= 70) {
              $grade = "A";
       } elseif ($score >= 60 && $score < 70) {
              $grade = "B";
       } elseif ($score >= 50 && $score < 60) {
              $grade = "C";
       } elseif ($score >= 40 && $score < 50) {
              $grade = "D";
       } elseif ($score >= 0 && $score < 40) {
              $grade = "F";
       }
       return $grade;
}

function myGradesRemark($score)
{
       //Display the result
       if ($score >= 70) {
              $grade = "Excellent";
       } elseif ($score >= 60 && $score < 70) {
              $grade = "Very Good";
       } elseif ($score >= 50 && $score < 60) {
              $grade = "Good";
       } elseif ($score >= 40 && $score < 50) {
              $grade = "Pass";
       } elseif ($score >= 0 && $score < 40) {
              $grade = "Failed";
       }
       return $grade;
}
