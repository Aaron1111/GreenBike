@extends('layout')

@section('content')
@guest
<h1><center><br><br><br><br><br><br>
Anda akan dialihkan ke halaman login dalam sesaat
</center></h1>
<meta http-equiv="refresh" content="4;URL='/login'" >
@else
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <h1><center>Daftar Sepeda</h1>
    <br>
    <a href="/home" class="btn btn-primary">Kembali</a>
    <a href="{{ route('shares.create')}}" class="btn btn-primary" style="float:right">&plus; Tambah sepeda</a>
    <br>
  <a>Total Jumlah Sepeda : {{$count}}</a>
  <table class="table table-striped" border="1">
    <thead>
        <tr>
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
            <td><center>{{$share->Id_peminjam}}</td>
            <td>{{$share->Nama}}</td>
            <td><center>{{$share->share_name}}</td>
            <td><center>{{$share->share_price}}</td>
            <td><center>{{$share->share_qty}}</td>
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

<div>
@endguest
@endsection
