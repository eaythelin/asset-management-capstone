@extends("layouts.pageslayout")
@section("content")

<x-pages-header title="Assets" :description="$desc">
  <x-heroicon-s-user-group class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<x-toast-success />
<x-session-error />

<div class = "md:m-4">
  <x-validation-error />
  
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-4 mx-2">

      <x-search-bar route="assets.index" placeholder="Search assets..."/>
      
      @can('manage assets')
      <div class = "flex flex-col sm:flex-row gap-3">
        <x-buttons class="bg-green-700">
          <x-heroicon-o-document-arrow-down class="size-5"/>
          Import from Excel
        </x-buttons>
        <a href="{{ route('assets.create') }}">
          <x-buttons class="w-full">
            <x-heroicon-s-plus class="size-5"/>
            Create Asset
          </x-buttons>
        </a>
      </div>
      @endcan
    </div>
    <x-tables :columnNames="$columns" :centeredColumns="[0,6,7]">
      <tbody class = "divide-y divide-gray-400">
          @foreach($assets as $asset)
            <tr>
              <th class = "p-3 text-center">{{ $asset->asset_code }}</th>
              <td class = "p-3 break-words max-w-xs">{{ $asset->name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $asset->serial_name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $asset->department->name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $asset->custodian?->first_name}} {{ $asset->custodian?->last_name}}</td>
              <td class = "p-3 break-words max-w-xs">{{ $asset->category->name}}</td>
              <td class = "p-3 break-words max-w-xs text-center">
                @if($asset->status->label() === "Active")
                  <span class = "badge badge-success text-white font-medium text">Active</span>
                @endif
              </td>
              <td class = "flex flex-row gap-2 sm:gap-3 justify-center">
                @can("view assets")
                  <a href="{{ route('assets.show', $asset->id) }}" class="w-full sm:w-auto flex justify-center">
                    <x-buttons class="px-4 tooltip tooltip-top" data-tip="View Asset" aria-label="View Asset Information">
                      <x-heroicon-s-eye class="size-4 sm:size-5"/>
                    </x-buttons>
                  </a>
                @endcan
                @can("manage assets")
                  <x-buttons
                    class="editBtn tooltip tooltip-top"
                    data-tip="Edit"
                    aria-label="Edit Asset">
                    <x-heroicon-o-pencil-square class="size-4 sm:size-5" />
                  </x-buttons>
                  <x-buttons
                    class="deleteBtn bg-red-700 tooltip tooltip-top"
                    data-tip="Dispose"
                    aria-label="Delete Asset">
                    <x-heroicon-s-archive-box class="size-4 sm:size-5"/>
                  </x-buttons>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
    </x-tables>
    <div class = "text-base-content">
      {{ $assets->links() }}
    </div>
  </div>
</div>

@endsection