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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
  <div class="w3-bar w3-green">
    <button class="w3-bar-item w3-button tablink w3-white" onclick="openCity(event,'Semua Sepeda')" id="defaultOpen">Semua Sepeda</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Sepeda Sedang Dipinjam'), location.href='/home'">Sepeda Sedang Dipinjam</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Sepeda Yang Tersedia'), location.href='/available'">Sepeda Yang Tersedia</button>
  </div>

  <div id="Sepeda Sedang Dipinjam" class="w3-container w3-border city" style="display:none"></div>
  <div id="Sepeda Yang Tersedia" class="w3-container w3-border city" style="display:none"></div>
  <div id="Semua Sepeda" class="w3-container w3-border city"></div>

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

</body
</html>
<a href="{{ route('shares.create')}}" class="btn btn-primary" style="float:right">&plus; Tambah sepeda</a>
<br>
<a>Total sepeda : {{$count}}</a>
<br>
<table class="w3-table-all" border="1">
    <thead>
        <tr class="w3-black">
          <td><center>NIM</td>
          <td><center>Nama</td>
          <td><center>ID Sepeda</td>
          <td><center>Jenis Sepeda</td>
          <td><center>Status</td>
          <td colspan="2"><center>Aksi</td>
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
            <td><center><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Ubah</a></td>
            <td><center>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
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
