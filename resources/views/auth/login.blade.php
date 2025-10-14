@extends('layouts.authlayout')
@section('content')
<div class = "min-h-screen flex items-center justify-center px-4">
  <div class = "card card-border p-6 w-full max-w-sm shadow-xl bg-base-200">
    <div class = "card-body w-full">
      <div class = "text-center">
        <h1 class = "font-bold text-lg sm:text-xl">Login</h1>
      </div>
      <form method = "POST" action = "{{ route('loginUser') }}">
        <div class = "flex flex-col gap-3">
          @csrf
          <div><label for = "email" class = "font-medium">Email</label></div>
          <div><input type = "email" id = "email" name = "email" class = "input w-full"></div>
          <div><label for = "password" class = "font-medium">Password</label></div>
          <div><input type = "password" id = "password" name = "password" class = "input w-full"></div>
          <div class = "card-actions justify-center">
            <button class = "btn btn-primary w-full">Login</button>
            <a href = "{{ route("password.request") }}" class = "text-sm hover:underline">Forgot Password? Click here</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection