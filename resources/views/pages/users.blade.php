@extends("layouts.pageslayout")
@section("content")
<x-pages-header title="Users" description="View and manage system users">
  <x-heroicon-s-user class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<div class = "md:m-4">
  {{-- show the errors! --}}
  <x-validation-error />
  
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">
      <form method = "GET" action="{{ route("users.show") }}">
        <div class = "flex flex-row gap-3">
          <input 
            type="text" 
            placeholder="Search users.." 
            class="input input-bordered w-full"
            name="search"
          />
          <x-buttons type="submit">Search</x-buttons>
        </div>
      </form>
      <x-buttons class="w-full sm:w-auto">
        <x-heroicon-s-plus class="size-5"/>
        Create User
      </x-buttons>
    </div>
    <x-tables :columnNames="$columns">
      <tbody class = "divide-y divide-gray-400">
          @foreach($users as $user)
            <tr>
              <th class = "p-3 text-center">{{ $user -> id }}</th>
              <td class = "p-3">{{ $user -> name}}</td>
              <td class = "p-3">{{ $user -> email}}</td>
              <td class = 'p-3'>{{ $user -> getRoleNames() -> first() }}</td>
              <td class = "flex flex-col sm:flex-row gap-2 sm:gap-4">
                @can("manage users")
                  <x-buttons>
                    <x-heroicon-o-pencil-square class="size-3 sm:size-5" />
                    Edit
                  </x-buttons>
                  <x-buttons>
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
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection