<div {{ $attributes->merge([
    "class" => "overflow-auto m-2 rounded-lg border border-gray-400 shadow-sm"]) }}>
    <table class="table">
    <!-- head -->
    <thead class="bg-gradient-to-r from-blue-300 to-indigo-200">
        <tr>
        @foreach($columnNames as $columnName)
            <th class="p-3 font-bold text-sm md:text-base">{{ $columnName }}</th>
        @endforeach
        </tr>
    </thead>
    {{ $slot }}
    </table>
</div>