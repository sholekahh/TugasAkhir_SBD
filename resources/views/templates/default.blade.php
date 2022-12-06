<!doctype html>
<html lang="en">
  <head>
    @include('templates.partials.head')
  </head>
  <body >
    <div class="wrapper">
      @include('templates.partials.sidebar')
      <div class="page-wrapper">
          <div class="container-xl">
            @yield('content')
          </div>
      </div>
    </div>
  </body>
</html>