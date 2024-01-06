<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Groups;
use App\Models\TeachersClasses;
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

        $groupsPerClass = collect();

        foreach ($classes_assigned_to_teacher as $class) {
            $groups = DB::table('groups')->select('group_name')->where('class_id', $class->id)->get();
            $groupsPerClass->push(['class_name'=>$class->class_name,'groups'=>$groups]);
           
        }



        return view('teacherDetails',['teacher'=>$teacher,'assigned_classes'=>$groupsPerClass]);
    }


    public function assignClass(){
        $classes = DB::table('classes')->select('class_name','id')->get();
        $teachers = DB::table('teachers')->select('id','first_name','last_name','email' ,'phone')->get();
        
        

        return view('assignClass',['classes'=>$classes,'teachers'=>$teachers]);
    }

    public function makeClassAssigement(Request $request){
        TeachersClasses::create([
                    'teacher_id' => $request->input('teacher_id'),
                    'class_id'  => $request->input('class_id'),
        ]);

        return $this->assignClass();
    }

    public function createClass(){
        return view('createClass');
    }

    public function makeClassCreation(Request $request){
        Classes::create([
            'class_name'=> $request->input('class_name')
        ]);

        return $this->createClass();
    }


    public function createGroup(){

        $classes = DB::table('classes')->select('class_name','id')->get();

        return view('createGroup',['classes'=>$classes]);
    }

    public function makeGroupCreation(Request $request){

        Groups::create([
            'group_name'=>$request->input('group_name'),
            'class_id'=>$request->input('class_id')
        ]);

        return $this->createGroup();
    }
}
