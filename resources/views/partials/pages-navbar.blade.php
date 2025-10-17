<div class="navbar bg-base-100 border-b border-gray-300 shadow-sm sticky top-0 z-10">
  <div class="flex-none xl:hidden">
    <!-- Drawer toggle button on mobile -->
    <label for="my-drawer" class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>
  </div>
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">Asset Manager</a>
  </div>
  <div class="flex-none gap-2 relative">
    <!-- User Icon -->
    <div x-data = "{open: false}" class = "relative">
      <!--Avatar button, when clicked it pops out a menu-->
      <button @click = "open = !open" class = "btn btn-ghost btn-circle avatar">
        <div class = "bg-neutral text-neutral-content w-10 rounded-full flex items-center justify-center">
          <span>JM</span>
        </div>
      </button>

      <!--The menu!!-->
      <div x-show="open" @click.away = "open = false" class = "absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50">
        <div class = "p-4 border-b">
          <p class = "font-semibold">Janna Mhay C. Guerrero</p>
          <p class = "text-sm text-gray-500">Insert Role Here</p>
        </div>
        <ul>
          <li>
            <form method = "POST" action="{{ route("logoutUser") }}">
              @csrf
              <button type = "submit" class = "btn btn-primary w-full">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>