@extends('layouts.pageslayout')
@section('content')
<x-pages-header title="Departments" description="View and manage departments">
  <x-heroicon-s-briefcase class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<div class = "md:m-4">
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">
      <input 
      type="text" 
      placeholder="Search departments..." 
      class="input input-bordered w-full sm:w-1/3"
      />
      <x-buttons class="w-full sm:w-auto" commandfor="createDepartment" command="show-modal">
        <x-heroicon-s-plus class="size-5"/>
        Create Department
      </x-buttons>
    </div>
    <x-tables :columnNames="$columns">
      <tbody class = "divide-y divide-gray-400">
          @foreach($departments as $department)
            <tr>
              <th class = "p-3 text-center">{{ $department -> id }}</th>
              <td class = "p-3">{{ $department -> department_name}}</td>
              <td class = "p-3">{{ $department -> description}}</td>
              <td class = "flex flex-col sm:flex-row gap-2 sm:gap-4">
                <x-buttons>
                  <x-heroicon-s-eye class="size-3 sm:size-5"/>
                  View
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
      {{ $departments->links() }}
    </div>
  </div>
</div>
@include('modals.department-modals.createDepartment-modal')
@endsection