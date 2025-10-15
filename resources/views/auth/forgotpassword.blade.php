@extends('layouts.authlayout')
@section('content')
<x-auth-card title="Forgot Password">
  <form method = "POST" action = "{{ route("password.email") }}">
    <div class = "flex flex-col gap-3">
      @csrf
      <label for = "email" class = "font-medium">Email Address</label>
      <input type = "email" id = "email" name = "email" class = "input w-full" placeholder="your.email@gmail.com">
      @error("email")
        <p class = "text-red-500 text-xs">{{ $message }}</p>
      @enderror
      <div class = "card-actions justify-center">
        @if(session(key:"status"))
          <p class = "text-green-500 text-xs">{{ session("status") }}</p>
        @endif
        <button class = "btn btn-primary w-full">Send Reset Email Link</button>
        <a href = "{{ route("login") }}" class = "text-sm hover:underline text-primary">Back to Login</a>
      </div>
    </div>
  </form>
</x-auth-card>
@endsection