@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">

  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'Sepeda Sedang Dipinjam')" id="defaultOpen">Sepeda Sedang Dipinjam</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Sepeda Yang Tersedia'), location.href='/available'" >Sepeda Yang Tersedia</button>
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
                <div class="card-header"><center>Daftar Sepeda Yang Sedang Dipinjam</center></div>
                <table class="table table-striped">
        <tr>
          <td>No</td>
          <td>ID Peminjam</td>
          <td>Nama</td>
          <td>ID Sepeda</td>
          <td>Jenis Sepeda</td>
          <td>Status</td>
          <td colspan="2">Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shares as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td>{{$share->Id_peminjam}}</td>
            <td>{{$share->Nama}}</td>
            <td>{{$share->share_name}}</td>
            <td>{{$share->share_price}}</td>
            <td>{{$share->share_qty}}</td>
            <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Ubah</a></td>
            <td>
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

                    <a href="{{ route('shares.create')}}" class="btn btn-primary">Tambah sepeda</a>
                    <a href="{{ route('shares.index')}}" class="btn btn-primary">Lihat daftar sepeda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
