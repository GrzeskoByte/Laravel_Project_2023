<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    public function index(){
        $teachers = DB::table('teachers')->select('id','first_name','last_name','email' ,'phone')->get();
        $groups = DB::table('groups')->select('id','group_name','class_id')->get();
        $classrooms = DB::table('classes')->select('class_name','id')->get();

        return view('teachers',['teachers'=>$teachers,'groups'=>$groups, 'classes'=>$classrooms]);
    }
    
    public function details($id){
        $teacher = DB::table('teachers')->select('id','first_name','last_name','email' ,'phone')->where('id',$id)->get();

        $allowed_groups = DB::table('teachers_classes')->select('class_id')->where('teacher_id',$teacher[0]->id)->get();

        $classIds = $allowed_groups->pluck('class_id')->toArray();
        $classes_assigned_to_teacher = Classes::whereIn('id', $classIds)->select('id', 'class_name')->get();

        return view('teacherDetails',['teacher'=>$teacher,'assigned_classes'=>$classes_assigned_to_teacher]);
    }
}
