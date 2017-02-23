<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
     <style type="text/css">
     body{
         background-image:url('www.jpg') ;
     }
   #navbar, #navbar-ifram {
    background-color:#DB7093;
    font-size:13px;
    font-family: 
    }
</style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>

                    <!-- Left Side Of Navbar -->
  <nav class="navbar navbar-i">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Penggajian</a>
      </div>
       <div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{{ url('/jabatan') }}">Jabatan</a></li>
                          <li><a href="{{ url('/golongan') }}">Golongan</a></li>
                          <li><a href="{{ url('/kategori') }}">Kategori Lembur</a></li>
                          <li><a href="{{ url('/lembur') }}">Lembur Pegawai</a></li>
                          <li><a href="{{ url('/pegawai') }}">Pegawai</a></li>
                          <li><a href="{{ url('/tunjangan') }}">Tunjangan</a></li>
                          <li><a href="{{ url('/tunjanganp') }}">Tunjangan Pegawai </a></li>
                          <li><a href="{{ url('/penggajian') }}">Penggajian</a></li>
                        &nbsp;





   <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
