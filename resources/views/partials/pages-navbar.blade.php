<div class="navbar bg-base-100 border-b border-gray-300 shadow-sm sticky top-0 z-10 lg:px-6">
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
    <a class="btn btn-ghost text-base md:text-2xl">Asset Manager</a>
  </div>
  <div class="flex items-center gap-3">
    <div class="avatar placeholder">
      <div class="bg-blue-800 text-neutral-content w-8 md:w-10 rounded-full flex items-center justify-center">
        <span class="text-xs md:text-base text-white">JM</span>
      </div>
    </div>
    <div>
      <!--Get the name of user-->
      <div class="font-medium text-xs md:text-sm">{{ Auth::user() -> name}}</div>
      <!--Get the role of user-->
      <div class="text-xs md:text-sm opacity-60">{{ Auth::user() -> getRoleNames() -> first() }}</div>
    </div>
  </div>
</div>