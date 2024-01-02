<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index ($class_id,$group_id){
            
        
            $groups = DB::table('groups')->select('id','group_name','class_id')->where('class_id',$class_id)->get();
            
            $classrooms = DB::table('classes')->select('class_name','id')->get();
            
            $students = DB::table('students')->select('id','first_name', 'last_name','email','phone')->where('group_id',$group_id)->get(); 

            $currentClass = DB::table('classes')->select('class_name','id')->where('id',$class_id)->get();

            $currentGroup = DB::table('groups')->select('group_name','id')->where('id',$group_id)->get();


            return view('home',['students'=> $students,  'groups'=>$groups, 'group_id'=>$group_id, 'group_name'=>$currentGroup,'classes' =>$classrooms,'current_class'=>$currentClass]);
    }

    public function nonArgsIndex (){
            $students = DB::table('students')->select('first_name', 'last_name','email','phone')->get(); 
            $groups = DB::table('groups')->select('id','group_name','class_id')->get();
            $classrooms = DB::table('classes')->select('class_name','id')->get();

            return view('home',['students'=> $students, 'groups'=>$groups, 'classes'=>$classrooms]);
    }


    public function destroy($id, $group_id, $class_id){
        $student = Students::find($id);
        
        if(isset($student)){
            $student->delete();
        }

      return redirect()->route("students.list", ['class_id' => $class_id, 'group_id' => $group_id]);
    }
}
