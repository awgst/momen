<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Momen</title>
  </head>
  <body>
    @include('snippets.auth')
    <div class="container-fluid bg-image border-bottom border-dark">
        {{-- Navbar Section --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container border-bottom border-dark">
                <a class="navbar-brand fw-bold fs-3" href="{{ url('/') }}">Momen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-1">
                    <li class="nav-item me-3 d-flex">
                        <a class="nav-link active mx-auto" aria-current="page" href="{{ url('/') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark text-light rounded-pill px-3" data-bs-toggle="modal" href="#registerToggle" role="button">Bergabung</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        {{-- End of Navbar Section --}}
        @yield('body')
    </div>
    @yield('content')
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    @yield('custom-script')
  </body>
</html>
