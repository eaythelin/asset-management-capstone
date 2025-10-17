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
  <div class="drawer xl:drawer-open">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col h-screen overflow-hidden">
      <!-- Top Navbar -->
      <section>
        @include("partials.pages-navbar")
      </section>
      <!-- Page content -->
      <div class="min-h-full p-6 bg-base-300 overflow-auto">
        @yield("content")
      </div>
    </div>

    <!-- Sidebar -->
    <!--Cant do Section since it breaks the UI-->
    @include("partials.pages-sidebar")    
  </div>
</div>
</body>
</html>