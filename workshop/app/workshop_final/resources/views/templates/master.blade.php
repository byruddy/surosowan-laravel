<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Aplikasi Inventori Barang</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  </head>
  <body>
    <main>
      <div class="container py-4">

        <!-- Header -->
        <header class="pb-3 mb-4 border-bottom">
          <div class="row">
            <div class="col">
              <a href="{{ url('/') }}" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">{{ env('APP_NAME') }} -  Aplikasi Inventori Barang</span>
              </a>
            </div>
            <div class="col text-end">
              <a href="https://github.com/byruddy/surosowan-laravel" target="_blank" class="btn btn-light">Github</a>
            </div>
          </div>
        </header>

        <!-- Main Content -->
        @yield('main')

        <!-- Footer -->
        <footer class="pt-3 mt-4 text-muted border-top">
          Surosowan Cyber feat byruddy &copy; 2022
        </footer>
      </div>
    </main>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>