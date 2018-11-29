@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">

  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Sepeda Sedang Dipinjam'), location.href='/home'">Sepeda Sedang Dipinjam</button>
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'Sepeda Yang Tersedia')" id="defaultOpen">Sepeda Yang Tersedia</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Semua Sepeda'), location.href='/all'">Semua Sepeda</button>
  </div>

  <div id="Sepeda Sedang Dipinjam" class="w3-container w3-border city"></div>
  <div id="Sepeda Yang Tersedia" class="w3-container w3-border city" style="display:none"></div>
  <div id="Semua Sepeda" class="w3-container w3-border city" style="display:none"></div>

</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

</body>
</html>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center>Daftar Sepeda Yang Tersedia</center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('shares.create')}}" class="btn btn-primary">Tambah sepeda</a>
                    <a href="{{ route('shares.index')}}" class="btn btn-primary">Lihat daftar sepeda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
