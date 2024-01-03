

@extends('layouts.app')

@section('title', 'Students')

@section('content')

<section class="w-full min-h-32 max-h-80 h-3/5 bg-slate-500 flex justify-center px-4 py-8">
    <h2 class="font-bold italic text-5xl"> Students </h2>
</section>

<div class="px-10 py-5 bg-slate-200">

@if(isset($current_class) || isset($group_name))
 <h2 class="font-bold">
        Current class name : 
        <span class="font-normal">
            @if(isset($current_class[0]->class_name))
            {{$current_class[0]->class_name}}
            @endif
        </span> 
    </h2>
    <h2 class="font-bold">
        Current group name : 
        <span class="font-normal">
            @if(isset($group_name[0]->group_name))
            {{$group_name[0]->group_name}}
            @endif
        </span> 
    </h2>
@else
    <h2 class="font-bold">All students from tenant</h2>
@endif  

  
</div>

<section class="w-full justify-center flex bg-slate-800">
    <ul class="flex-grow bg-slate-200 divide-y divide-gray-200 dark:divide-gray-700 mx-10 my-5">
        
        @foreach($students as $student)
        <li class="pb-3 sm:pb-4 w-full px-10 py-5">
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full" src="{{Avatar::create($student->first_name)->toBase64()}}" alt="Avatar">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                        {{$student->first_name}}
                        {{$student->last_name}}
                    </p>
                    
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        {{$student->email}}
                    </p>
                </div>

                @if(isset($student->id))
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    <button type="button"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <a href="{{route('users.edit',['id'=>$student->id,'type'=>'student'])}}">
                            Edit
                        </a>
                    </button>
                    <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Move</button>
                  
                    @if(isset($group_name[0]->id) && isset($current_class[0]->id))
                    <form id='delete_form' action="{{ route('students.destroy', ['id'=>$student->id, 'group_id'=>$group_name[0]->id, 'class_id'=>$current_class[0]->id]) }}" method="post">
                          @csrf
                          @method('DELETE')
                         <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</button>  
                    </form>
                    @endif
                </div>
                @endif
            </div>
        </li>
        @endforeach
    </ul>
    
    
</section>

@endsection
