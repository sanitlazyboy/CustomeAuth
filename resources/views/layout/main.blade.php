<!doctype html>
<html lang="en">
    <head>
            @include('layout.head')
    </head>

    <body>
        <main>
            @yield('main-container')
        </main>
      {{-- Footer Include --}}
      @include('layout.footer')
    </body>
</html>
