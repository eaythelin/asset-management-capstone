@if($errors->any())
    <div class="alert alert-error mb-4 p-0 overflow-hidden">
        <!-- Collapse wrapper -->
        <div class="collapse collapse-arrow w-full">
        <input type="checkbox" class="peer" />
        
        <!-- Title area: shows summary -->
        <div class="collapse-title font-semibold bg-error text-error-content flex flex-row gap-3">
            <x-heroicon-c-exclamation-circle class="size-5"/>
            {{ $errors->count() }} errors occurred. Click to see details.
        </div>

        <!-- Content area: detailed errors -->
        <div class="collapse-content">
            <ul class="list-disc pl-5 space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        </div>
    </div>
@endif