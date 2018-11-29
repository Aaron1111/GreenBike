@extends('layouts.app')

@section('content')
@endsection
<!DOCTYPE html>
<html>
<head>
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
    font-size: 40px;
    font-family: TrashHand;
    color : white;
    text-align: left;
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


<body>
      <!-- <h1 class="title">Selamat Datang<br>
        di GreenBike IPB</h1> -->

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
