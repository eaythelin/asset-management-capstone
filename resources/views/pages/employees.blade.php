@extends("layouts.pageslayout")
@section("content")
<!--Change description depending on the role-->
@php
  $role = Auth::user() -> getRoleNames() -> first();

  $desc = $role === "System Supervisor" ? "View, add, and manage employees and their assets" : "View employees and their assigned assets"
@endphp

<x-pages-header title="Employees" :description="$desc">
  <x-heroicon-s-user-group class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

@endsection