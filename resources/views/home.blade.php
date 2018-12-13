@extends('layouts.app')

@section('content')
@guest
<h1><center><br><br><br><br><br><br>
Anda akan dialihkan ke halaman login dalam sesaat
</center></h1>
<meta http-equiv="refresh" content="4;URL='/login'" >
@else
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 33.33%;
}

table {
    counter-reset: rowNumber;
}

table tr {
    counter-increment: rowNumber;
}

table tr td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
</head>
<body>
  <div class="w3-bar w3-green">
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Semua Sepeda'), location.href='/all'">Semua Sepeda</button>
    <button class="w3-bar-item w3-button tablink w3-white" onclick="openCity(event,'Sepeda Sedang Dipinjam')" id="defaultOpen">Sepeda Sedang Dipinjam</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Sepeda Yang Tersedia'), location.href='/available'" >Sepeda Yang Tersedia</button>
  </div>

  <div id="Sepeda Sedang Dipinjam" class="w3-container w3-border city"></div>
  <div id="Sepeda Yang Tersedia" class="w3-container w3-border city" style="display:none"></div>
  <div id="Semua Sepeda" class="w3-container w3-border city" style="display:none"></div>

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

// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2019 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

</script>

</body>
</html>
<br>
<a>Total sepeda yang dipinjam: {{$count}}
<br>
<table class="w3-table-all" border="1" >
    <thead>
        <tr  class="w3-black">
          <td><center>Nim</td>
          <td><center>Nama</td>
          <td><center>ID Sepeda</td>
          <td><center>Jenis Sepeda</td>
          <td><center>Status</td>
            <td><center>Sisa Waktu</td>
            <td><center>Aksi</td>
          </tr>
      </thead>
      <tbody>
          @foreach($shares as $share)
          <tr>
              <td><center>{{$share->nim}}</td>
              <td>{{$share->nama}}</td>
              <td><center>{{$share->id_sepeda}}</td>
              <td><center>{{$share->jenis_sepeda}}</td>
              <td><center>{{$share->status}}</td>
              <td><center>{{$dd}} hari, &nbsp {{$hh}}:&nbsp{{$mm}}:&nbsp{{$ss}} s</td>
            <td><center><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Ubah</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
