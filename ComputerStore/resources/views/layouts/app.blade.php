<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Online Store')</title>
  <div class="vr bg-white mx-2 d-none d-lg-block"></div>
  @guest
  <a class="nav-link active" href="{{ route('login') }}">Login</a>
  <a class="nav-link active" href="{{ route('register') }}">Register</a>
  @else
  <form id="logout" action="{{ route('logout') }}" method="POST">
    <a role="button" class="nav-link active"
      onclick="document.getElementById('logout').submit();">Logout</a>
    @csrf
  </form>
  @endguest

</head>

<body>

  @yield('content')

</body>

</html>