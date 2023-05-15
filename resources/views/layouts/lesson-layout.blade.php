<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @stack('prepend-styles')
  @notifyCss
  <x-lesson-styles />
  @stack('addon-styles')


  <title>{{ $title }} - Production</title>
</head>

<body>
  <script src="{{ url('assets/js/initTheme.js') }}"></script>

  <div id="app">
    {{ $slot }}
  </div>

  @stack('prepend-scripts')
  <x-lesson-scripts />
  @stack('addon-scripts')

  <x:notify-messages />
  @notifyJs
</body>

</html>