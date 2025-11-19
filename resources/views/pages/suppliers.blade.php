@extends("layouts.pageslayout")
@section("content")
<x-pages-header title="Suppliers" description="View and manage asset suppliers">
  <x-heroicon-s-truck class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<x-toast-success />
<x-session-error />

<div class = "md:m-4">
  <x-validation-error />
  
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">

      <x-search-bar route="suppliers.index" placeholder="Search suppliers..."/>
      
      @can('manage suppliers')
        <x-buttons class="w-full sm:w-auto" onclick="createSupplier.showModal()">
          <x-heroicon-s-plus class="size-5"/>
          Create Supplier
        </x-buttons>
      @endcan
    </div>
    <x-tables :columnNames="$columns">
      <tbody class = "divide-y divide-gray-400">
          @foreach($suppliers as $supplier)
            <tr>
              <th class = "p-3 text-center">{{ $supplier->id }}</th>
              <td class = "p-3 break-words max-w-xs">{{ $supplier->name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $supplier->contact_person}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $supplier->email}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $supplier->phone_number}}</td>
              <td class = "p-3 break-words whitespace-normal max-w-xs">{{ $supplier->address}}</td>
              <td class = "flex flex-col sm:flex-row gap-2 sm:gap-4">
                @can("manage suppliers")
                  <x-buttons onclick="editSupplier.showModal()"
                    class="editBtn">
                    <x-heroicon-o-pencil-square class="size-3 sm:size-5" />
                    Edit
                  </x-buttons>
                  <x-buttons onclick="deleteSupplier.showModal()"
                    class="deleteBtn">
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
      {{ $suppliers->links() }}
    </div>
  </div>
</div>

@include('modals.supplier-modals.create-supplier-modal')
@endsection