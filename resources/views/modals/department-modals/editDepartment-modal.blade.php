<x-modal :name="'editDepartment'" title="Edit Department">
  <form id="editForm" method = "POST">
      <div class = "flex flex-col gap-3 px-2 sm:px-4">
        @csrf
        @method("PUT")
        <label for = "department_name" class = "font-medium">Department Name <span class = "text-red-600 tooltip tooltip-right" data-tip="Required">*</span></label>
        <input class = "input w-full border-2 border-gray-400 department_name" name = "department_name">
        <label for = "description" class = "font-medium">Description <span class = "text-gray-400 text-xs">(optional)</span></label>
        <textarea class = "textarea w-full border-2 border-gray-400 description" name = "description"></textarea>
        <x-buttons class="mt-2" type="submit">Submit</x-buttons>
      </div>
    </form>
</x-modal>