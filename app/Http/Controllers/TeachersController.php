<?php

namespace App\Http\Controllers;

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
}
