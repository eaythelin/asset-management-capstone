@extends('layouts.authlayout')
@section('content')
<x-auth-card title="Forgot Password">
  <form method = "POST" action = "{{ route("password.email") }}">
    <div class = "flex flex-col gap-3">
      @csrf
      {{-- Email field --}}
      <label for = "email" class = "font-medium">Email Address</label>
      <div class = "relative">
        <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 opacity-50 z-10 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <input type = "email" name = "email" id = "email" class = "input border-2 border-base-500 pl-10 w-full" placeholder="Type your email">
      </div>
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