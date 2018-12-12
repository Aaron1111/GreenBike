@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>

</style>
</head>

<body>
  &nbsp <a href="/home" class="btn btn-primary">Kembali</a>
    <br><br>
    &nbsp <img src="/images/img_avatar.png" alt="Avatar" class="avatar">
&nbspNama : {{ Auth::user()->name }}<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbspEmail : {{ Auth::user()->email }}<br>
<script>

</script>

</body>
</html>
@endsection
