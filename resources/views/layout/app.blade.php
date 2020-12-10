<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHPTest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.styles')
  </head>
  <body>
    <div class="wrapper">
        @include('layout.menu')
        <div class="container">
            @yield('content')
        </div>
    </div>
    @include('layout.scripts')
    @yield('custom-script')
  </body>
</html>
