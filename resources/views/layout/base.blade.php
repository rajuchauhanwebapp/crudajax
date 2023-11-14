<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
   <!-- Latest compiled and minified CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

   @yield('title')
</head>
<body>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top py-3">
      <div class="container-fluid">
         <a class="navbar-brand text-uppercase" href="javascript:void(0)">Crud Ajax</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="mynavbar" style="width: fit-content !importent;">
            <ul class="navbar-nav me-auto">
               <li class="nav-item">
               <a class="nav-link" href="{{ route('home') }}">User List</a>
               </li>
            </ul>
         </div>
         <div class="text-white">
            <h3 class="px-5 text-uppercase">Crud Operation Using Ajax</h3>
         </div>
      </div>
   </nav>

   <div class="container text-end" style="margin-top: 80px;">
      <a href="{{ route('create_profile') }}" class="btn btn-dark">Add New User</a>
   </div>
   @yield('main-content')

   <!-- Latest compiled JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
   {{-- JQuery CDN --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="{{ asset('js/myscript.js') }}"></script>
</body>
</html>