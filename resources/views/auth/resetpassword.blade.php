@extends('layouts.authlayout')
@section('content')
<x-auth-card title="Reset Password">
  <form method = "POST" action = "{{ route("password.update") }}">
    <div class = "flex flex-col gap-3">
      @csrf

      {{-- Hidden input field for the token because we also need the reset token! --}}
      <input name = "token" value = "{{ $token }}" type = "hidden">
      
      <label for = "email" class = "font-medium">Email Address</label>
      <input type = "email" id = "email" name = "email" class = "input w-full" value = "{{ old('email', $email) }}" readonly>
      @error("email")
        <p class = "text-red-500 text-xs">{{ $message }}</p>
      @enderror
      <label for = "password" class = "font-medium">New Password</label>
      <input type = "password" id = "password" name = "password" class = "input w-full">
      <label for = "password" class = "font-medium">Confirm Password</label>
      <input type = "password" name = "password_confirmation" class = "input w-full">
      @error("password")
        <p class = "text-red-500 text-xs">{{ $message }}</p>
      @enderror
      <div class = "card-actions justify-center pt-2">
        <button class = "btn btn-primary w-full">Confirm</button>
      </div>
    </div>
  </form>
</x-auth-card>
@endsection