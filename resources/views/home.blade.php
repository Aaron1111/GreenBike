@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aksi</div>

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
