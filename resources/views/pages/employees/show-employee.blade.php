@extends('layouts.pageslayout')
@section('content')

<div class = "md:m-4">
  <div class = "mb-4">
    <a href="{{ route('employees.index') }}" 
    class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline transition-colors"> 
      <x-heroicon-o-arrow-left class="size-4 mr-2 mt-1" /> 
    Return to Employees</a>
  </div>

  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class = "flex flex-col sm:flex-row items-center sm:justify-between px-2 gap-5">
      <div class="flex flex-col gap-2">
        <p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $employee->getFullName() }}</p>
        <div class="flex items-center gap-2 text-sm">
            <x-heroicon-s-briefcase class="text-gray-500 size-4"/>
            <span class="text-gray-500">Department:</span>
            <span class="font-semibold text-gray-700">{{ $employee->department->department_name }}</span>
        </div>
      </div>
      <div class="flex items-center gap-2">
        @if($employee->custodian)
          <span class="badge badge-success p-4 font-medium text-sm flex items-center gap-1">
            <x-heroicon-m-check class="size-5" />
            Asset Custodian
          </span>
        @else
          <span class="badge badge-error p-4 font-medium text-sm flex items-center gap-1 text-white">
            <x-heroicon-c-x-mark class="size-5" />
            No Asset Assigned
          </span>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection