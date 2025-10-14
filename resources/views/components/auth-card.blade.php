<div class = "min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-base-300 to-base-100">
  <div class = "card card-border p-6 w-full max-w-sm shadow-2xl bg-base-200">
    <div class = "card-body w-full">
      <div class = "text-center p-2">
        <h1 class = "font-bold text-lg sm:text-xl">{{ $title }}</h1>
      </div>
      {{ $slot }}
    </div>
  </div>
</div>