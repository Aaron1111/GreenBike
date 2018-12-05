@extends('layout')

@section('content')
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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No</td>
          <td>ID Peminjam</td>
          <td>Nama</td>
          <td>ID Sepeda</td>
          <td>Jenis Sepeda</td>
          <td>Status</td>
          <td colspan="2">Aksi</td>
          <td>Total Jumlah Sepeda :</td>
          <td>{{$count}}</td>
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
  <a href="/home" class="btn btn-primary">Kembali</a>
  <a href="{{ route('shares.create')}}" class="btn btn-primary">Tambah sepeda</a>
<div>
@endsection
