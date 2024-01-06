<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    public function index(){
        $teachers = DB::table('teachers')->select('id','first_name','last_name','email' ,'phone','class_id')->get();
        $groups = DB::table('groups')->select('id','group_name','class_id')->get();
        $classrooms = DB::table('classes')->select('class_name','id')->get();

        return view('teachers',['teachers'=>$teachers,'groups'=>$groups, 'classes'=>$classrooms]);
    }
    
    public function details($id){
        $teacher = DB::table('teachers')->select('id','first_name','last_name','email' ,'phone','class_id')->where('id',$id)->get();
        $class_name = DB::table('classes')->select('class_name','id')->where('id', $teacher[0]->class_id)->get();

        $allowed_groups = DB::table('groups')->select('id','group_name')->where('id',$class_name[0]->id)->get();

        return view('teacherDetails',['teacher'=>$teacher, 'class_name'=>$class_name, 'allowed_groups'=>$allowed_groups]);
    }
}
