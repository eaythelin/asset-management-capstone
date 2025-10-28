<dialog id="createDepartment" class="modal">
  <div class="modal-box shadow-2xl">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <div class = "flex flex-col gap-2 text-center p-4 mb-2">
      <h2 class="text-xl font-bold">Create Department</h2>
      <hr class="border-gray-400 mt-2">
    </div>
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
  </div>
</dialog>