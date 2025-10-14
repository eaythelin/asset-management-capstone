@extends('layouts.authlayout')
@section('content')

<x-auth-card title="Login">
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
</x-auth-card>
@endsection