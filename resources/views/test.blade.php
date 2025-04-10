@extends('layouts.app')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pre-Test & Post-Test</title>
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
            font-family: Arial, sans-serif;
            margin: 0;
            padding-top: 70px;
        }
        section {
            background-color: #f2f2f2;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }
        section h2 {
            margin: 0;
            color: #333;
        }
        section a {
            text-decoration: none;
            color: #337ab7;
        }
        section a:hover {
            text-decoration: underline;
        }

.sidebar {
  position: fixed;
  left: -250px;
  width: 250px;
  height: 100%;
  background: #042331;
  transition: all .5s ease;
  z-index: 1100
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
   <section>
        <a href="/pretest">
            <h2>Pre-Test</h2>
        </a>
        <p>Test yang dikerjakan sebelum menggunakan LMS.</p>
    </section>
    <section>
        <a href="/posttest">
            <h2>Post-Test</h2>
        </a>
        <p>Test yang dikerjakan sesudah menggunakan LMS.</p>
    </section>
    
  </body>
</html>
