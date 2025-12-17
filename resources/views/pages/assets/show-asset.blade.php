@extends("layouts.pageslayout")
@section("content")

<div class="md:mx-4">
  <x-back-link route="assets.index">Return to Assets</x-back-link>

  @if($asset->image_path)
    <img src="{{ asset('storage/' . $asset->image_path) }}" alt="{{ $asset->name }}">
  @else
    <p>No Image uploaded!</p>
  @endif
</div>
@endsection