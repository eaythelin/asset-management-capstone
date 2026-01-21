@extends('layouts.pageslayout')
@section('content')

<x-pages-header title="Workorders" description="View and manage workorders">
  <x-heroicon-s-clipboard-document class="text-blue-800 size-8 md:size-10"/>
</x-pages-header>

<x-toast-success />
<x-session-error />

@endsection