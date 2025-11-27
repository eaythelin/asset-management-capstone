@extends('layouts.pageslayout')
@section('content')

<div class = "md:mx-4">
  <div class = "mb-4">
    <x-back-link route="employees.index">Return to Employees</x-back-link>
  </div>

  <div class = "bg-white p-4 rounded-2xl shadow-xl mb-4">
    <div class = "flex flex-col sm:flex-row items-center sm:justify-between px-2 gap-5">
      <div class="flex flex-col gap-2">
        <p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $employee->getFullName() }}</p>
        <div class="flex items-center gap-2 text-sm">
            <x-heroicon-s-briefcase class="text-gray-500 size-4"/>
            <span class="text-gray-500">Department:</span>
            <span class="font-semibold text-gray-700">{{ $employee->department->name }}</span>
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

  <div class="bg-white p-6 rounded-2xl shadow-xl">
    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Assigned Assets</h3>
    
    <!-- if no assets assigned -->
    <div class="flex flex-col items-center justify-center py-12 text-center">
      <x-heroicon-s-archive-box class="size-16 text-gray-300 mb-4" />
      <p class="text-gray-600 text-lg">No assets assigned</p>
      <p class="text-gray-400 text-sm mt-2">Assets will appear here once they are assigned to this employee</p>
    </div>
  </div>
</div>
@endsection