@extends('layouts.pageslayout')
@section('content')
<div class = "md:mb-4">
  <a href="{{ route('employees.index') }}" 
  class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline transition-colors"> 
    <x-heroicon-o-arrow-left class="size-4 mr-2 mt-1" /> 
    Return to Employees</a>
</div>
@endsection