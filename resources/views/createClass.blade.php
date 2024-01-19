@extends('layouts.app')

@section('title', 'Create user')

@section('content')

<form class="max-w-md mx-auto my-10 bg-slate-200 px-10 py-5 rounded-lg" method="POST" action="{{route('create.makeClass')}}" >
   @csrf
   @method('POST')
  <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 ">First name</label>
      <input name="class_name"  type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500">
  </div>

  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
    Send
  </button>

</form>

@endsection