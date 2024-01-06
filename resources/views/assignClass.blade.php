
@extends('layouts.app')

@section('title', 'Create class')

@section('content')

@section('content')
<form class="max-w-md mx-auto my-10 bg-slate-200 px-10 py-5 rounded-lg" method="POST" action="" >
   @csrf
   @method('POST')


<div class="mb-5 ">
<label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 ">Classes</label>

<select name="class_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

      @foreach($classes as $class)
        <option value="{{$class->id}}" selected>
          {{$class->class_name}}
        </option>
      <option value="{{$class->id}}">
        {{$class->class_name}}
      </option>
      @endforeach
      
    </select>


<label for="large-input" class="mt-5 block mb-2 text-sm font-medium text-gray-900 ">Teachers</label>

<select name="teacher_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

      @foreach($teachers as $teacher)
      
        <option value="{{$teacher->id}}" selected>
          {{$teacher->first_name}}
        </option>
      @endforeach
      
    </select>
</div>



  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    Send
  </button>

</form>
@endsection