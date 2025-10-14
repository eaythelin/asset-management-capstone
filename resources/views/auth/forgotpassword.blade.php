@extends('layouts.authlayout')
@section('content')
<x-auth-card title="Forgot Password">
  <form>
    <div class = "flex flex-col gap-3">
      @csrf
      <label for = "email" class = "font-medium">Email Address</label>
      <input type = "email" id = "email" name = "email" class = "input w-full" placeholder="your.email@gmail.com">
      @error("email")
        <p class = "text-red-500 text-xs">{{ $message }}</p>
      @enderror
      <div class = "card-actions justify-center">
        <button class = "btn btn-primary w-full">Login</button>
        <a href = "{{ route("login") }}" class = "text-sm hover:underline text-primary">Back to Login</a>
      </div>
    </div>
  </form>
</x-auth-card>
@endsection