@extends("layouts.pageslayout")
@section("content")
<!--Change description depending on the role-->
<x-pages-header title="Employees" :description="$desc">
  <x-heroicon-s-user-group class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<x-toast-success />
<x-session-error />

<div class = "md:m-4">
  <x-validation-error />
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">
      
      <x-search-bar route="employees.index" placeholder="Search employees..."/>

      @can('manage employees')
        <x-buttons class="w-full sm:w-auto" onclick="createEmployee.showModal()">
          <x-heroicon-s-plus class="size-5"/>
          Create Employee
        </x-buttons>
      @endcan
    </div>
    <x-tables :columnNames="$columns" :centeredColumns="[3]">
      <tbody class = "divide-y divide-gray-400">
          @foreach($employees as $employee)
            <tr>
              <th class = "p-3 text-center">{{ $employee-> id}}</th>
              <td class = "p-3">{{ $employee -> getFullName()}}</td>
              <td class = "p-3">{{ $employee-> department -> name}}</td>
              <td class = "p-3 text-center">
                @if($employee -> custodian)
                  <span class="badge badge-success"><x-heroicon-m-check class="size-5"/></span>
                @else
                  <span class="badge badge-error"><x-heroicon-c-x-mark class="size-5"/></span>
                @endif
              </td>
              <td class = "flex flex-col sm:flex-row gap-2 sm:gap-4">
                @can('view employees')
                  <a href="{{ route('employees.show', $employee->id) }}" class="w-full sm:w-auto flex justify-center">
                    <x-buttons class="px-5">
                      <x-heroicon-o-eye class="size-3 sm:size-5"/>
                      View
                    </x-buttons>
                  </a>
                @endcan
                @can('manage employees')
                  <x-buttons onclick="editEmployee.showModal()"
                    class="editButton"
                    data-first-name="{{ $employee -> first_name}}"
                    data-last-name="{{ $employee -> last_name }}"
                    data-department="{{ $employee-> department -> id}}"
                    data-route="{{ route('employees.update', $employee->id ) }}">
                    <x-heroicon-o-pencil-square class="size-3 sm:size-5" />
                    Edit
                  </x-buttons>
                  <x-buttons onclick="deleteEmployee.showModal()"
                    class="deleteButton"
                    data-route="{{ route('employees.delete', $employee->id ) }}"
                    data-has-user="{{ $employee -> user_count ? 1 : 0}}">
                    <x-heroicon-s-trash class="size-3 sm:size-5"/>
                    Delete
                  </x-buttons>
                @endcan
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

@include('modals.employee-modals.create-employee-modal', $departments)
@include('modals.employee-modals.edit-employee-modal', $departments)
@include('modals.employee-modals.delete-employee-modal')

@endsection

@section('scripts')
  @vite('resources/js/employee/delete-employee.js')
  @vite('resources/js/employee/edit-employee.js')
@endsection