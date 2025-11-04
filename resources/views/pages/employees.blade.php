@extends("layouts.pageslayout")
@section("content")
<!--Change description depending on the role-->
@php
  $role = Auth::user() -> getRoleNames() -> first();

  $desc = $role === "System Supervisor" ? "View, add, and manage employees and their assets" : "View employees and their assigned assets";
@endphp

<x-pages-header title="Employees" :description="$desc">
  <x-heroicon-s-user-group class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<x-toast-success />

<div class = "md:m-4">
  <x-error-dropdown />
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">
      <form method = "GET" action="{{ route("employees.show") }}">
        <div class = "flex flex-row gap-3">
          <input 
            type="text" 
            placeholder="Search employees.." 
            class="input input-bordered w-full"
            name="search"
          />
          <x-buttons type="submit">Search</x-buttons>
        </div>
      </form>
      @can('manage employees')
        <x-buttons class="w-full sm:w-auto" commandfor="createEmployee" command="show-modal">
          <x-heroicon-s-plus class="size-5"/>
          Create Employee
        </x-buttons>
      @endcan
    </div>
    <x-tables :columnNames="$columns" :centeredColumns="[3]">
      <tbody class = "divide-y divide-gray-400">
          @foreach($employees as $employee)
            <tr>
              <th class = "p-3 text-center">{{ $employee-> id }}</th>
              <td class = "p-3">{{ $employee -> first_name}} {{ $employee -> last_name }}</td>
              <td class = "p-3">{{ $employee-> department -> department_name}}</td>
              <td class = "p-3 text-center">
                @if($employee -> custodian)
                  <span class="badge badge-success"><x-heroicon-m-check class="size-5"/></span>
                @else
                  <span class="badge badge-error"><x-heroicon-c-x-mark class="size-5"/></span>
                @endif
              </td>
              <td class = "flex flex-col sm:flex-row gap-2 sm:gap-4">
                <x-buttons>
                  <x-heroicon-o-eye class="size-3 sm:size-5"/>
                  View
                </x-buttons>
                <x-buttons>
                  <x-heroicon-o-pencil-square class="size-3 sm:size-5" />
                  Edit
                </x-buttons>
                <x-buttons>
                  <x-heroicon-s-trash class="size-3 sm:size-5"/>
                  Delete
                </x-buttons>
              </td>
            </tr>
          @endforeach
        </tbody>
    </x-tables>
    <div class = "text-base-content">
      {{ $employees->links() }}
    </div>
  </div>
</div>

@include('modals.employee-modals.createEmployee-modal', $departments)

@endsection