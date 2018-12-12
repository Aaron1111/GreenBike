@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Ubah Informasi Sepeda
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('shares.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">ID Peminjam:</label>
          <input type="text" class="form-control" name="nim" value={{ $share->nim }} />
        </div>
        <div class="form-group">
          <label for="name">Nama:</label>
          <input type="text" class="form-control" name="nama" value={{ $share->nama}} />
        </div>
        <div class="form-group">
            <label for="quantity">Status:</label>
            <select name="status" class="form-control">
              <option value="Tersedia" >Tersedia</option>
              <option value="Dipinjam">Dipinjam</option>
            </select>
            <!-- <input type="text" class="form-control" name="share_qty"/> -->
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </form>
  </div>
</div>
@endsection
