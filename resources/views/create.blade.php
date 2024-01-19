@extends('layouts.app')

@section('title', 'Create user')

@section('content')
<form class="max-w-md mx-auto my-10 bg-slate-200 px-10 py-5 rounded-lg" method="POST" action="{{route('users.makeCreation',['type'=>$type])}}" >
   @csrf
   @method('POST')
  <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 ">First name</label>
      <input name="first_name"  type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500">
  </div>

    <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 ">Last name</label>
      <input name="last_name" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500">
</div>

    <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
      <input name="email" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500">
  </div>

   <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
      <input name="phone"  type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500">
  </div>

@if($type=="student")
<div class="mb-5 ">
<label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 ">Group</label>

<select name="group_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

  
      @foreach($groups as $group)
      
        <option value="{{$group->id}}" selected>
          {{$group->group_name}}
        </option>
      <option value="{{$group->id}}">
        {{$group->group_name}}
      </option>
      @endforeach
      
    </select>
</div>

@endif

  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
    Send
  </button>

</form>

@endsection