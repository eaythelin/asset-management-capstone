@extends("layouts.pageslayout")
@section("content")
<x-pages-header title="Subcategories" description="View and manage asset subcategories">
  <x-heroicon-s-folder-open class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>
<x-toast-success />
<x-session-error />

<div class = "md:m-4">
  <x-validation-error />
  
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">

      <x-search-bar route="subcategory.index" placeholder="Search subcategories..."/>
      
      @can('manage sub-categories')
        <x-buttons class="w-full sm:w-auto" onclick="createSubCategory.showModal()">
          <x-heroicon-s-plus class="size-5"/>
          Create Sub-Category
        </x-buttons>
      @endcan
    </div>
    <x-tables :columnNames="$columns">
      <tbody class = "divide-y divide-gray-400">
          @foreach($subCategories as $subCategory)
            <tr>
              <th class = "p-3 text-center">{{ $subCategory -> id }}</th>
              <td class = "p-3 break-words max-w-xs">{{ $subCategory -> name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $subCategory -> category -> name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $subCategory -> description}}</td>
              <td class = "flex flex-col sm:flex-row gap-2 sm:gap-4">
                @can("manage categories")
                  <x-buttons onclick="editSubCategory.showModal()"
                    class="editBtn">
                    <x-heroicon-o-pencil-square class="size-3 sm:size-5" />
                    Edit
                  </x-buttons>
                  <x-buttons onclick="deleteSubCategory.showModal()"
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
      {{ $subCategories->links() }}
    </div>
  </div>
</div>

@include('modals.subcategory-modals.create-subcategory-modal')
@endsection