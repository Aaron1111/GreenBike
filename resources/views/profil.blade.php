@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.zuzu {
  vertical-align: middle;
  width: 10px;
  height: 10px;
  border-radius: 50%;
}
</style>
</head>

<body>
  &nbsp <a href="/home" class="btn btn-primary">Kembali</a>
    <br><br>
            <center><img src="/images/img_avatar.png" alt="Avatar" style="width: 150px; height: 150px; border-radius: 50%;">
            <br><br><h1>{{ Auth::user()->name }}
            <br>{{ Auth::user()->email }}</h1></center>

<script>

</script>

</body>
</html>
@endsection
