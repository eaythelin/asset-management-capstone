<div class="drawer-side lg:fixed lg:top-0 lg:left-0 lg:h-screen lg:z-0">
  <label for="my-drawer" class="drawer-overlay"></label>
  <ul class="menu p-4 w-80 min-h-full text-base-content bg-blue-800 flex-col">
    <!--Beneficiary Logo + Name (logo is temporary)-->
    <div class="flex items-center p-4 border-b border-blue-700">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-yellow-400">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
      </svg>
      <span class="ml-3 font-bold text-yellow-400 text-lg md:text-xl">Master Coating Industrial Technology Incorporated</span>
    </div>
    <li>
      <h1 class = "menu-title text-base text-white px-4 py-2 rounded">Menu</h1>
      <ul>
        @can("view dashboard")
        <li><x-navlinks :routeName="'showDashboard'" title="Dashboard">
          <x-heroicon-s-home class="size-5 mr-2" />
        </x-navlinks></li>
        @endcan
        @can("view employees")
        <li><x-navlinks :routeName="'showEmployees'" title="Employees">
          <x-heroicon-s-user-group class="size-5 mr-2"/>
        </x-navlinks></li>
        @endcan
        @can("view users")
        <li><x-navlinks :routeName="'showUsers'" title="Users">
          <x-heroicon-s-user class="size-5 mr-2"/>
        </x-navlinks></li>
        @endcan
        @can("view configs")
        <li>
          {{-- if any of the routes here gets chosen the config drowdown stays open --}}
          <details {{ request()->routeIs("showDepartments") ? 'open' : '' }}>
            <x-dropdown-navs title="Configurations">
              <x-heroicon-o-adjustments-horizontal class="size-5 mr-2" />
            </x-dropdown-navs>
            <ul>
              @can("view departments")
              <li><x-navlinks :routeName="'showDepartments'" title="Departments">
                <x-heroicon-s-building-office-2 class="size-5 mr-2"/>
              </x-navlinks></li>
              @endcan
            </ul>
          </details>
        </li>
        @endcan
      </ul>
    </li>
    <li>
      <h1 class = "menu-title text-base text-white px-4 py-2 rounded">General</h1>
      <ul>
        <!--Logout-->
        <li>
          <form class="w-full group hover:bg-yellow-700/20" method = "POST" action="{{ route("logoutUser") }}">
            @csrf
            <button 
              type="submit" 
              class="flex items-center group-hover:text-yellow-400 rounded text-base text-white w-full text-left appearance-none bg-transparent border-none cursor-pointer p-1"
            >
              <x-heroicon-o-arrow-left-on-rectangle class="size-5 mr-4.5 mt-0.5" />
              Logout
            </button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</div>