<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

use Illuminate\Contracts\Auth\MustVerifyEmail;


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

    public function nonArgsIndex () {
            $students = DB::table('students')->select('first_name', 'last_name','email','phone','id')->get(); 
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


    public function edit($type,$id,$after_action = false){
        $user = NULL;

        $groups = DB::table('groups')->select('id','group_name','class_id')->get();
        $classes = DB::table('classes')->select('class_name','id')->get();

        if($type == "student"){
            $user = DB::table('students')->select('first_name','last_name','email','phone','id','group_id')->where('id', $id)->get();
        }
        
        if($type == 'teacher'){
            // add class id
            $user = DB::table('teachers')->select('first_name','last_name','email','phone','id')->where('id', $id)->get();
        }
        
        return view('edit', ['id'=>$id,'user'=>$user[0], 'type'=>$type,'groups'=>$groups, 'after_action'=>$after_action, 'classes'=>$classes]); 
    }

    public function editUser(Request $request,$type,$id){

        if($type == 'student'){
            $user = Students::find($id);    

            if($user){
                $user->update([
                    'first_name' => $request->input('first_name'),
                    'last_name'  => $request->input('last_name'),
                    'email'      => $request->input('email'),
                    'phone'      => $request->input('phone'),
                    'group_id'   => $request->input('group_id')
                ]);
            }
        }

        if($type == 'teacher'){
            $user = Teachers::find($id);    

            if($user){
                $user->update([
                    'first_name' => $request->input('first_name'),
                    'last_name'  => $request->input('last_name'),
                    'email'      => $request->input('email'),
                    'phone'      => $request->input('phone'),
                ]);
            }

        }

        return $this->edit($type,$id, true);
    }


    public function create($type){
        $groups = DB::table('groups')->select('id','group_name','class_id')->get();
        return view('create',['groups'=>$groups, 'type'=>$type]);
    }

    public function makeCreation(Request $request,$type){
       if($type == 'student'){
                Students::create([
                    'first_name' => $request->input('first_name'),
                    'last_name'  => $request->input('last_name'),
                    'email'      => $request->input('email'),
                    'phone'      => $request->input('phone'),
                    'group_id'   => $request->input('group_id')
                ]);
        
        }

        if($type == 'teacher'){
               Teachers::create([
                    'first_name' => $request->input('first_name'),
                    'last_name'  => $request->input('last_name'),
                    'email'      => $request->input('email'),
                    'phone'      => $request->input('phone'),
                ]);
        }

        return $this->create($type);
    }
}
