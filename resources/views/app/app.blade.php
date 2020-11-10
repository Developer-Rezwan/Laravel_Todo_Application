      <!doctype html>
      <html lang="en">

      <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="{{ asset('assets/css') }}/bootstrap.min.css">
          <link rel="stylesheet" href="{{ asset('assets/css') }}/all.css">
          <title>ToDo List App With Laravel & Ajax</title>
      </head>

      <body>
          <div class="container">
              @yield('content')
          </div>
          <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

          <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
          <script src="{{ asset('assets/js') }}/jquery-3.4.1.js"></script>
          <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>
          <script src="{{ asset('assets/js') }}/popper.min.js"></script>
          <script src="{{ asset('assets/js') }}/myjs.js"></script>
      </body>

      </html>
