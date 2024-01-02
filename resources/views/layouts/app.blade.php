
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Title')</title>
    @vite('resources/css/app.css')
</head>
<body>
  <nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
  
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="{{route('actions')}}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Students</a>
            <a href="{{route('teachers')}}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Teachers</a>
          </div>
        </div>
      </div>
      
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        
      <select id="group_select"  class="mx-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
     
        <option disabled selected value="">Change group</option>
     

      @foreach($groups as $group)
        @if($group->group_name)
          <option value="{{$group->id}}" >
            {{$group->group_name}}
          </option>
        @endif
      @endforeach
      
      </select>

     <select id="class_select" class="mx-5 w-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
     
       <option disabled selected value="">Change classroom</option>

      @foreach($classes as $class)
        @if($class->class_name)
          <option value="{{$class->id}}" >
            {{$class->class_name}}
          </option>
        @endif
      @endforeach
      
      </select>

        <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="absolute -inset-1.5"></span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button>

        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Products</a>
    </div>
  </div>
</nav>

    <main class="mb-12">
        @yield('content')
    </main>

<footer
  class="fixed w-full  bottom-0 bg-neutral-200 text-center dark:bg-neutral-700 lg:text-left">
  <div class="p-4 text-center text-neutral-700 dark:text-neutral-200">
    ANS ELBLĄG 2023
    <span
      class="text-neutral-800 dark:text-neutral-400"
      >Grzegorz Sierocki</span
    >
  </div>
</footer>
    <script>
      const queryString = window.location.search; 

      const class_id = window.location.pathname.split('/').filter(v=>v!=='')[1]
      const group_id = window.location.pathname.split('/').filter(v=>v!=='')[2]


      document.getElementById('group_select').onchange = (e)=> window.location.href= `/students/${class_id ?? 1}/${e.target.value}`
      document.getElementById('class_select').onchange = (e)=> {window.location.href= `/students/${e.target.value}/${group_id ?? 1}`
    }

      
    </script>
</body>
</html>
