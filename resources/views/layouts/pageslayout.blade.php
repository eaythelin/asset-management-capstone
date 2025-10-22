<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
  <title>Fixed Asset Management System</title>
</head>
<body>
  <div class="drawer lg:drawer-open">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col lg:ml-80 h-screen">
      <!-- Top Navbar -->
      @include("partials.pages-navbar")

      <!-- Page content -->
      <div class="min-h-full p-7 bg-base-300 overflow-auto">
        @yield("content")
      </div>
    </div>

    <!-- Sidebar -->
    <!--Cant do Section since it breaks the UI-->
    @include("partials.pages-sidebar")    
  </div>
  @yield("scripts")
</div>
</body>
</html>