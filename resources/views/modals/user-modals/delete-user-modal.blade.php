<x-modal :name="'deleteUser'" title="Delete User">
  <div class = "flex flex-col gap-6 text-center sm:px-4">
    <h2 class = "text-base"> Are you sure to delete this User Account?</h2>
    <form method="POST" id = "deleteForm">
      @csrf
      @method("DELETE")
      <x-buttons class="w-full" type="Submit">Submit</x-buttons>
    </form>
  </div>
</x-modal>