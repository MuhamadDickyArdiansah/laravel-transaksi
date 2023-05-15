<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @notifyCss

  @stack('prepend-styles')
  <x-guest-styles />
  @stack('addon-styles')

  <title>{{ $title }} - Production</title>
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      {{ $slot }}
    </div>
  </div>

  <x:notify-messages />
  @notifyJs
</body>

</html>