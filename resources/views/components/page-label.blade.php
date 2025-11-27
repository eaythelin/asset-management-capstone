<label for="{{ $for }}" class="font-medium w-30">
    {{ $slot }}
    @if($required) 
        <span class = "text-red-600 tooltip tooltip-right" data-tip="Required">*</span>
    @endif
</label>