<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @stack('prepend-styles')
  @notifyCss
  <x-admin-styles />
  @stack('addon-styles')


  <title>{{ $title }} - ECourse</title>
</head>

<body>
  <script src="{{ url('assets/js/initTheme.js') }}"></script>

  <div id="app">
    <x-admin-sidebar />

    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      {{ $slot }}
    </div>
  </div>

  @stack('prepend-scripts')
  <x-admin-scripts />
  @stack('addon-scripts')

  <x:notify-messages />
  @notifyJs
</body>

</html>