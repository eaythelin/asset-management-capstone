@extends('layouts.pageslayout')
@section('content')
<!-- Header -->
<x-pages-header title="Dashboard" description="Monitor fixed assets and system activity">
  <x-heroicon-s-home class="text-blue-800 size-8 md:size-10" />
</x-pages-header>

<!--Cards-->
<div class ="grid grid-cols-2 md:grid-cols-4 gap-4 md:mx-6 p-3 bg-white rounded-2xl shadow-xl">
  <x-dashboard-cards bgColor="bg-green-500" title="Active Assets" :number="0">
    <x-heroicon-s-clipboard-document-check class="size-8 md:size-10"/>
  </x-dashboard-cards>
  <x-dashboard-cards bgColor="bg-red-500" title="Disposed Assets" :number="0">
    <x-heroicon-s-trash class="size-8 md:size-10"/>
  </x-dashboard-cards>
  <x-dashboard-cards bgColor="bg-gray-800" title="Assets Under Service" :number="0">
    <x-heroicon-s-wrench-screwdriver class="size-8 md:size-10"/>
  </x-dashboard-cards>
  <x-dashboard-cards bgColor="bg-orange-500" title="Expired Assets" :number="0">
    <x-heroicon-s-exclamation-triangle class="size-8 md:size-10" />
  </x-dashboard-cards>
</div>

<!--Middle Charts-->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:mx-6 mt-6">
  <!--Chart for Category-->
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <canvas id="categoryChart"></canvas>
  </div>
  <div class = "bg-white p-4 rounded-2xl shadow-xl">
    <!--Chart for Subcategory(which is filtered)-->
    <h3 class="text-base font-bold text-gray-800 mb-4 text-center">Filter Subcategory by Category</h3>
    <div class="flex flex-row justify-between items-center mb-4 m-2">
      <label for="category" class="font-semibold text-base text-gray-700">Select Category</label>
      <select id="category" class="border-2 border-gray-300 rounded-lg p-1 w-1/2 bg-white shadow-sm hover:border-blue-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all cursor-pointer">
        <option value="it_equipment">IT Equipment</option>
        <option value="furniture">Furniture</option>
        <option value="vehicles">Vehicle</option>
      </select>
    </div>
    <div class="m-2 overflow-auto max-h-60 rounded-lg border border-gray-200 shadow-sm">
      <table class="w-full text-left">
        <thead class="bg-gradient-to-r from-blue-50 to-indigo-50 border-b-2 border-gray-200">
          <tr>
            <th class="p-3 font-semibold text-gray-700">Subcategory</th>
            <th class="p-3 font-semibold text-gray-700">Count</th>
          </tr>
        </thead>
        <tbody id="subcategoryTable" class="divide-y divide-gray-400">
          <!--Populated by the javascript!!-->
        </tbody>
      </table>
    </div>
  </div>
  <div class = "bg-white p-4 rounded-2xl shadow-xl"></div>
</div>
@endsection

@section('scripts')
    @vite('resources/js/dashboard/categorypiechart.js')
    @vite('resources/js/dashboard/subcategory.js')
@endsection