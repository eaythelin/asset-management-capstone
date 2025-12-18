@extends("layouts.pageslayout")
@section("content")

<div class="md:mx-4">
  <x-back-link route="assets.index">Return to Assets</x-back-link>
  <x-validation-error />
  <form method="POST" action="{{ route("assets.update", $asset->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="bg-white p-4 rounded-2xl shadow-2xl mt-4">
      <h2 class="text-lg font-bold text-gray-800 mb-4">General Information</h2>
      <div class="flex flex-col sm:flex-row gap-6">
        {{-- Left Column --}}
        <div class = "flex flex-col flex-1 gap-4">
          <div class="form-row">
            <x-page-label for="asset_code" :required="true">Asset Code</x-page-label>
            <x-page-input name="asset_code" id="asset_code" value="{{ $asset->asset_code }}" readonly/>
          </div>

          <div class="form-row">
            <x-page-label for="asset_name" :required="true">Asset Name</x-page-label>
            <x-page-input name="asset_name" id="asset_name" value="{{ old('asset_name', $asset->name) }}"/>
          </div>

          <div class="form-row">
            <x-page-label for="serial_name" :required="true">Serial Name</x-page-label>
            <x-page-input name="serial_name" id="serial_name" value="{{ old('serial_name', $asset->serial_name) }}"/>
          </div>

          <div class = "form-row">
            <x-page-label for="image">Asset Image</x-page-label>
            <input type="file" class="file-input" name="image" id="image">
          </div>
        </div>
        {{-- Right Column --}}
        <div class = "flex flex-col flex-1 gap-4">
          <div class="form-row">
            <x-page-label for="category" :required="true">Category</x-page-label>
            <x-page-select name="category" id="category">
              <option value="" disabled>--Select Category--</option>
              @foreach($categories as $id=>$name)
                <option value="{{ $id }}" {{ old('category', $asset->category_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
            </x-page-select>
          </div>

          <div class = "form-row">
            <x-page-label for="subcategory">Subcategory</x-page-label>
            <x-page-select name="subcategory" id="subcategory" data-current-subcategory="{{ $asset->sub_category_id ?? '' }}" disabled>
              <option value="" disabled>--Select Subcategory--</option>
            </x-page-select>
          </div>

          <div class = "form-row">
            <x-page-label for="description">Description</x-page-label>
            <x-page-textarea name="description" id="description">
              {{ old('description', $asset->description) }} 
            </x-page-textarea>
          </div>
        </div>
      </div>

      <hr class="border-gray-300 m-5">
      <h2 class="text-lg font-bold text-gray-800 mb-4">Assignment Details</h2>

      <div class="flex flex-col sm:flex-row gap-6">
        {{-- Left Column --}}
        <div class = "flex flex-col flex-1 gap-4">
          <div class="form-row">
            <x-page-label for="department" :required="true">Department</x-page-label>
            <x-page-select name="department" id="department">
              <option value="" disabled>--Select Department--</option>
              @foreach($departments as $id=>$name)
                <option value="{{ $id }}" {{ old('department', $asset->department_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
            </x-page-select>
          </div>
        </div>

        {{-- Right Column --}}
        <div class = "flex flex-col flex-1 gap-4">
          <div class="form-row">
            <x-page-label for="custodian">Custodian</x-page-label>
            <x-page-select name="custodian" id="custodian">
              <option value="" disabled>--Select Employee--</option>
              @foreach($employees as $id=>$name)
                <option value="{{ $id }}" {{ old('custodian', $asset->custodian_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
            </x-page-select>
          </div>
        </div>
      </div>

      <hr class="border-gray-300 m-5">
      <h2 class="text-lg font-bold text-gray-800 mb-4">Financial Details</h2>

      <hr class="border-gray-300 m-5">
      <h2 class="text-lg font-bold text-gray-800 mb-4">Misc. Details</h2>

      <div class="flex flex-col sm:flex-row gap-6">
        {{-- Left Column --}}
        <div class = "flex flex-col flex-1 gap-4">
          <div class="form-row">
            <x-page-label for="supplier" :required="true">Supplier</x-page-label>
            <x-page-select name="supplier" id="supplier">
              <option value="" disabled>--Select Supplier--</option>
              @foreach($suppliers as $id=>$name)
                <option value="{{ $id }}" {{ old('supplier', $asset->supplier_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
            </x-page-select>
          </div>
        </div>

        {{-- Right Column --}}
        <div class = "flex flex-col flex-1 gap-4"></div>
      </div>

      <div class="flex justify-end mt-2">
        <x-buttons type="submit" class="w-full md:w-auto">
          <x-heroicon-o-pencil-square class="size-4 sm:size-5" />
          Save Changes
        </x-buttons>
      </div>
    </div>
  </form>
</div>
@endsection

@section('scripts')
  @vite('resources/js/assets/edit-asset/getEditSubcategory.js')
@endsection