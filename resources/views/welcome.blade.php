@extends('layouts.app')

@section('content')
<html>
<body>

      <h4 class="title">Selamat Datang<br>
        di GreenBike IPB</h4>

        @if (Route::has('login'))
                @auth
                <center>
                <form>
                      <input class="button3" type="button" value="Beranda" onclick="window.location.href='/home'" />
                </form>
              </center>
                @endauth
        @endif

</body>
</html>

@endsection
