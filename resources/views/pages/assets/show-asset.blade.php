@extends("layouts.pageslayout")
@section("content")

<div class="md:mx-4">
  <div class = "mb-4">
    <x-back-link route="assets.index">Return to Assets</x-back-link>
  </div>

  <div class="bg-white p-4 rounded-2xl shadow-2xl mb-4">
    <div class="flex flex-col sm:flex-row items-center gap-4">
      {{-- Image! --}}
      <div class="size-32 flex-shrink-0">{{-- prevents the image from being pushed --}}
        @if($asset->image_path)
          <img src="{{ Storage::url($asset->image_path) }}" alt="{{ $asset->name }}" class="w-full h-full object-cover rounded-lg shadow-xl">
        @else
          <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
            <x-heroicon-o-photo class="size-16 text-gray-400" />
          </div>
        @endif
      </div>

      <div class="flex-grow">{{-- will take as much space as possible --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $asset->name }}</h2>
        <div class="flex items-center gap-2 text-sm mt-1">
          <x-heroicon-s-hashtag class="text-gray-500 size-4"/>
          <span class="text-gray-500">Asset Code:</span>
          <span class="font-semibold text-gray-700">{{ $asset->asset_code }}</span>
        </div>
        <div class="flex items-center gap-2 text-sm mt-1">
          <x-heroicon-s-identification class="text-gray-500 size-4"/>
          <span class="text-gray-500">Serial Name:</span>
          <span class="font-semibold text-gray-700">{{ $asset->serial_name ?? 'N/A' }}</span>
        </div>
      </div>

      <div class="flex flex-col mx-10 gap-2">
        @if($asset->status->label() === "Active")
          <span class="badge badge-success text-white font-medium text-sm p-3">Active</span>
        @endif
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-4 mb-4">
    <div class="bg-white p-4 rounded-2xl shadow-2xl">
      <div class="flex flex-row items-center gap-2 mb-2">
        <x-heroicon-s-information-circle class="size-6 text-blue-700"/>
        <p class="text-lg font-semibold">General Details</p>
      </div>
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Category</p>
          <p class="font-semibold text-gray-700">{{ $asset->category->name }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Subcategory</p>
          <p class="font-semibold text-gray-700">{{ $asset->subCategory?->name ?? 'N/A'}}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Description</p>
          <p class="font-semibold text-gray-700">{{ $asset->description ?? 'N/A' }}</p>
        </div>
      </div>
    </div>
    <div class="bg-white p-4 rounded-2xl shadow-2xl">
      <div class="flex flex-row items-center gap-2 mb-2">
        <x-heroicon-s-user-group class="size-6 text-green-700"/>
        <p class="text-lg font-semibold">Assignment Details</p>
      </div>
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Department</p>
          <p class="font-semibold text-gray-700">{{ $asset->department->name }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Custodian</p>
          <p class="font-semibold text-gray-700">{{ $asset->custodian->full_name ?? 'No Custodian Assigned'}}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white p-4 rounded-2xl shadow-2xl mb-4">
    <div class="flex flex-row items-center gap-2 mb-2">
      <x-heroicon-s-currency-dollar class="size-6 text-yellow-400"/>
      <p class="text-lg font-semibold">Financial Details</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Acquisition Date</p>
          <p class="font-semibold text-gray-700">{{ $asset->acquisition_date?->format('F j, Y') ?? 'N/A'}}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Useful Life in Years</p>
          <p class="font-semibold text-gray-700">{{ $asset->useful_life_in_years ?? 'N/A'}}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">End of Life Date</p>
          <p class="font-semibold text-gray-700">{{ $asset->end_of_life_date?->format('F j, Y') ?? 'N/A'}}</p>
        </div>
      </div>
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Cost</p>
          <p class="font-semibold text-gray-700">₱{{ $asset->cost ?? 'N/A'}}</p>
        </div>
        <div>
          <p class="text-sm text-gray-500">Salvage Value</p>
          <p class="font-semibold text-gray-700">₱{{ $asset->salvage_value ?? 'N/A'}}</p>
        </div>
      </div>
      <div class="space-y-3">
        <div>
          <p class="text-sm text-gray-500">Current Book Value</p>
          <p class="font-semibold text-gray-700">₱{{ $asset->book_value}}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white p-4 rounded-2xl shadow-2xl mb-4">
    <div class="flex flex-row items-center gap-2 mb-2">
      <x-heroicon-s-clipboard-document-list class="size-6 text-gray-600"/>
      <p class="text-lg font-semibold">Misc. Details</p>
    </div>
    <div class="space-y-3">
      <div>
        <p class="text-sm text-gray-500">Supplier</p>
        <p class="font-semibold text-gray-700">{{ $asset->supplier->name ?? 'N/A'}}</p>
      </div>
    </div>
  </div>
</div>
@endsection