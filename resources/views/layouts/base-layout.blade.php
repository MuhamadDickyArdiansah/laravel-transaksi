<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  @notifyCss

  @stack('prepend-styles')
  <x-base-styles />
  @stack('addon-styles')

  <title>{{ $title }} - ECourse</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    #btn-back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      border-radius: 99px;
      display: none;
      background-color: #28D146;
      color: white;
    }

    #btn-back-to-top:hover {
      box-shadow: rgba(0, 0, 0, 0.4) 2px 2px 6px;
    }

    #btn-back-to-top i {
      font-size: 30px;
    }
  </style>
</head>

<body>
  <script src="{{ url('assets/js/initTheme.js') }}"></script>

  <x-base-navbar />

  <main>
    {{ $slot }}
  </main>

  <!-- Back to top button -->
  <a href="https://wa.me/6285172001140" class="btn btn-floating btn-lg" id="btn-back-to-top">
    <i class="fa-brands fa-whatsapp"></i>
  </a>

  <x-base-footer />



  @stack('prepend-scripts')
  <x-base-scripts />
  @stack('addon-scripts')

  <x:notify-messages />
  @notifyJs

  <script>
    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {

      mybutton.style.display = "block";

    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
</body>

</html>