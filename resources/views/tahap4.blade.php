@extends('layouts.app')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tahap4</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
*{
  padding: 0;
  margin: 0;
  list-style: none;
  text-decoration: none;
}
body {
  font-family: 'Roboto', sans-serif;
  padding-top: 70px;
}
.sidebar {
  position: fixed;
  left: -250px;
  width: 250px;
  height: 100%;
  background: #042331;
  transition: all .5s ease;
  z-index: 1100;
}
.sidebar header {
  font-size: 22px;
  color: white;
  line-height: 70px;
  text-align: center;
  background: #063146;
  user-select: none;
}
.sidebar ul a{
  display: block;
  height: 100%;
  width: 100%;
  line-height: 65px;
  font-size: 20px;
  color: white;
  padding-left: 40px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid rgba(255,255,255,.1);
  transition: .4s;
}
ul li:hover a{
  padding-left: 50px;
}
.sidebar ul a i{
  margin-right: 16px;
}
#check{
  display: none;
}
label #btn,label #cancel{
  position: fixed;
  background: #042331;
  border-radius: 3px;
  cursor: pointer;
}
label #btn{
  left: 30px;
  top: 20px;
  font-size: 35px;
  color: white;
  padding: 6px 12px;
  transition: all .5s;
  z-index: 1100
}
label #cancel{
  z-index: 1111;
  left: -195px;
  top: 17px;
  font-size: 30px;
  color: #0a5275;
  padding: 4px 9px;
  transition: all .5s ease;
}
#check:checked ~ .sidebar{
  left: 0;
}
#check:checked ~ label #btn{
  left: 250px;
  opacity: 0;
  pointer-events: none;
}
#check:checked ~ label #cancel{
  left: 195px;
}
#check:checked ~ section{
  margin-left: 250px;
}
section{
  background: url(bg.jpeg) no-repeat;
  background-position: center;
  background-size: cover;
  height: 100vh;
  transition: all .5s;
}
</style>
  </head>
  <body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>LMS</header>
    <ul>
     <li><a href="/home"><i class="fas fa-qrcode"></i>Dashboard</a></li>
     <!--<li><a href="#"><i class="fas fa-link"></i>Shortcuts</a></li>-->
     <li><a href="/materi"><i class="fas fa-stream"></i>Materi</a></li>
     <li><a href="/pjbl"><i class="fas fa-calendar-week"></i>PJBL</a></li>
     <li><a href="/test"><i class="far fa-question-circle"></i>Test</a></li>
     <!--<li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>-->
                                        @csrf
                                    </form>   
  </ul>
   </div>
   <section><form method="POST" action="{{ route('submit.tahap4-1') }}" enctype="multipart/form-data">
        @csrf
        <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
        <div>
          <p> Progress 1</p>
            <label for="file">Pilih file (PDF maksimal 2MB):</label>
            <input type="file" name="file" accept=".pdf" required>
        </div>
        <button type="submit">Upload</button>
    </form>
    <br>
    <form method="POST" action="{{ route('submit.tahap4-2') }}" enctype="multipart/form-data">
        @csrf
        <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
        <div>
        <p> Progress 2</p>
            <label for="file">Pilih file (PDF maksimal 2MB):</label>
            <input type="file" name="file" accept=".pdf" required>
        </div>
        <button type="submit">Upload</button>
    </form></section>
  </body>
</html>
