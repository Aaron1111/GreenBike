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
<<<<<<< HEAD
          <input type="text" class="form-control" name="Id_peminjam" value={{ $share->Id_peminjam }} />
        </div>
        <div class="form-group">
          <label for="name">Nama:</label>
          <input type="text" class="form-control" name="Nama" value={{ $share->Nama}} />
        </div>
        <div class="form-group">
          <label for="name">ID Sepeda:</label>
          <input type="text" class="form-control" name="share_name" value={{ $share->share_name }} />
=======
          <input type="text" class="form-control" name="share_name" value={{ $share->Id_peminjam }} />
>>>>>>> f1605562ab11700f7a5b7a6bc69647e0b7a5ca2d
        </div>
        <div class="form-group">
          <label for="price">Nama:</label>
          <input type="text" class="form-control" name="share_price" value={{ $share->Nama }} />
        </div>
        <div class="form-group">
          <label for="quantity">Status:</label>
          <input type="text" class="form-control" name="share_qty" value={{ $share->share_qty }} />
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </form>
  </div>
</div>
@endsection
