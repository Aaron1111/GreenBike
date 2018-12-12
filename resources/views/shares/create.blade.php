@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Tambah Sepeda
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
      <form method="post" action="{{ route('shares.store') }}">
      	 <div class="form-group">
              @csrf
              <label for="name">ID Peminjam:</label>
              <input type="text" class="form-control" name="Id_peminjam"/>
          </div> <div class="form-group">
              @csrf
              <label for="name">Nama:</label>
              <input type="text" class="form-control" name="Nama"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">ID Sepeda:</label>
              <input type="text" class="form-control" name="share_name"/>
          </div>
          <div class="form-group">
              <label for="price">Jenis Sepeda :</label>
              <input type="text" class="form-control" name="share_price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Status:</label>
              <select name="share_qty" class="form-control">
                <option value="Tersedia" >Tersedia</option>
                <option value="Dipinjam">Dipinjam</option>
              </select>
              <!-- <input type="text" class="form-control" name="share_qty"/> -->
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
  </div>
</div>
  <a href="{{ route('shares.index')}}" class="btn btn-primary">Lihat daftar sepeda</a>
@endsection
