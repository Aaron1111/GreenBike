@extends('layouts.app')

@section('content')
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {font-family: "Lato", sans-serif;
      color:white;
      background: url("/images/welcome.jpg");
      background-repeat: no-repeat;
      background-size: 100%;
}

@font-face {
    font-family: trash;
    src: url(TrashHand.ttf);
}
@font-face {
    font-family: trash;
}

.content {
    text-align: center;
    font-family: TrashHand;
    color : white;
}

.title {
    font-size: 100px;
    padding-top: 150px;
    font-family: TrashHand;
    color : white;
    text-align: center;
}
.top{
    height: 70px;
    width: 100%;
    background-color: white;
    position : relative;
    background: linear-gradient(to right, #00537e, #3aa17e);
}

.button3 {
  font-family: TrashHand;
  float: center;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 40px;
  padding: 3px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button3 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button3 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button3:hover span {
  padding-right: 25px;
}

.button3:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body background: "welcome.jpg">

      <h4 class="title">Selamat Datang<br>
        di GreenBike IPB</h4>

        @if (Route::has('login'))
                @auth
                <center>
                <form>
                      <input class="button3" type="button" value="Beranda" onclick="window.location.href='/home'" />
                </form>
              </center>
                @endauth
        @endif

</body>
</html>

@endsection
