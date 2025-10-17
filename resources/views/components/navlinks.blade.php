<a href = "{{ route($routeName) }}" class="flex items-center hover:bg-blue-700 text-base text-white px-4 py-2 rounded {{ request()->routeIs($routeName) ? 'font-bold bg-blue-700' : '' }}">
    {{ $slot }} {{ $title }}
</a>