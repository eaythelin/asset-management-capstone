@extends("layouts.pageslayout")
@section("content")

<div class="md:mx-4">
  <x-back-link route="assets.index">Return to Assets</x-back-link>

  <div class="bg-white p-4 rounded-2xl shadow-2xl mt-4">
    <h2 class="text-lg font-bold text-gray-800 mb-4">General Information</h2>
    <div class = "flex flex-col sm:flex-row gap-6">
      {{-- Left Column!! --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="asset_code" :required="true">Asset Code</x-page-label>
          <x-page-input value="{{ $nextCode }}" name="asset_code" id="asset_code" />
        </div>

        <div class = "form-row">
          <x-page-label for="name" :required="true">Asset Name</x-page-label>
          <x-page-input name="name" id="name" autocomplete="off" />
        </div>

        <div class = "form-row">
          <x-page-label for="serial_name">Serial Name</x-page-label>
          <x-page-input name="serial_name" id="serial_name"/>
        </div>

        <div class = "form-row">
          <x-page-label for="image_path">Asset Image</x-page-label>
          <input type="file" class="file-input" name="image_path" id="image_path">
        </div>
      </div>

      {{-- Right Column --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="category" :required="true">Category</x-page-label>
          <x-page-select name="category_id" id="category">
            <option value="" disabled selected>--Select Category--</option>
            @foreach($categories as $id => $name)
              <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </x-page-select>
        </div>

        <div class = "form-row">
          <x-page-label for="subcategory">Subcategory</x-page-label>
          <x-page-select name="subcategory_id" id="subcategory">
            <option value="" disabled selected>--Select Subcategory--</option>
            @foreach($subcategories as $id=>$name)
              <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </x-page-select>
        </div>

        <div class = "form-row">
          <x-page-label for="description">Description</x-page-label>
          <x-page-textarea name="description" id="description"/>
        </div>
      </div>
    </div>

    <hr class="border-gray-300 m-5">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Assignment Details</h2>

    <div class = "flex flex-col sm:flex-row gap-6">
      {{-- Left Column!! --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="department" :required="true">Department</x-page-label>
          <x-page-select name="department_id" id="department">
            <option value="" disabled selected>--Select Department--</option>
            @foreach($departments as $id=>$name)
              <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </x-page-select>
        </div>
      </div>

      {{-- Right Column --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="custodian">Custodian</x-page-label>
          <x-page-select name="custodian_id" id="custodian">
            <option value="" disabled selected>--Select Employee--</option>
            @foreach($employees as $id=>$name)
              <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </x-page-select>
        </div>
      </div>
    </div>

    <hr class="border-gray-300 m-5">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Financial Details</h2>
    <div class = "flex flex-col sm:flex-row gap-6" x-data="{isDepreciable : false}">
      {{-- Left Column!! --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="is_depreciable">Is Depreciable
            <span class="text-xs text-gray-500 align-super tooltip tooltip-info" data-tip="Asset will be included in asset depreciation">?</span>
          </x-page-label>
          <input x-model="isDepreciable" type="checkbox" class="checkbox border-2 border-gray-400" name="is_depreciable" id="is_depreciable">
        </div>

        <div class = "form-row">
          <x-page-label for="cost" required="isDepreciable">Cost</x-page-label>
          <x-page-input name="cost" id="cost" />
        </div>

        <div class = "form-row">
          <x-page-label for="salvage_value" required="isDepreciable">Salvage Value</x-page-label>
          <x-page-input name="salvage_value" id="salvage_value" />
        </div>
      </div>

      {{-- Right Column --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="acquisition_date" required="isDepreciable">Acquisition Date</x-page-label>
          <input class="input max-w-xs border-2 border-gray-400" type="date" name="acquisition_date" id="acquisition_date">
        </div>

        <div class = "form-row">
          <x-page-label for="useful_life_in_years" required="isDepreciable">Useful Life in Years</x-page-label>
          <x-page-input name="useful_life_in_years" id="useful_life_in_years" />
        </div>

        <div class = "form-row">
          <x-page-label for="end_of_life_date" required="isDepreciable">End of Life Date</x-page-label>
          <input class="input max-w-xs border-2 border-gray-400" type="date" name="end_of_life_date" id="end_of_life_date" disabled>
        </div>
      </div>
    </div>

    <hr class="border-gray-300 m-5">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Misc. Details</h2>
    <div class = "flex flex-col sm:flex-row gap-6">
      {{-- Left Column --}}
      <div class = "flex flex-col flex-1 gap-4">
        <div class = "form-row">
          <x-page-label for="supplier">Supplier</x-page-label>
          <x-page-select name="supplier_id" id="supplier">
            <option value="" disabled selected>--Select Supplier--</option>
            @foreach($suppliers as $id=>$name)
              <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </x-page-select>
        </div>
      </div>

      {{-- Right Column --}}
      <div class = "flex flex-col flex-1 gap-4">
        
      </div>
    </div>
  </div>
</div>
@endsection