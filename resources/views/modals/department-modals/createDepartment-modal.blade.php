<x-modal :name="'createDepartment'" title="Create Department">
  <form method = "POST" action = "{{ route('departments.store') }}">
      <div class = "flex flex-col gap-3 px-2 sm:px-4">
        @csrf
        <label for = "department_name" class = "font-medium">Department Name <span class = "text-red-600 tooltip tooltip-right" data-tip="Required">*</span></label>
        <input class = "input w-full border-2 border-gray-400" name = "department_name" id="department_name">
        <label for = "description" class = "font-medium">Description <span class = "text-gray-400 text-xs">(optional)</span></label>
        <textarea class = "textarea w-full border-2 border-gray-400" name = "description" id="description"></textarea>
        <x-buttons class="mt-2" type="submit">Submit</x-buttons>
      </div>
    </form>
</x-modal>