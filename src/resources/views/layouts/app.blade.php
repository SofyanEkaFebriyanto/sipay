<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SIPAY</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
background:#f4f6fb;
font-family:Arial,sans-serif;
overflow-x:hidden;
}

.wrapper{
display:flex;
min-height:100vh;
}

.sidebar{

width:255px;
background:linear-gradient(
180deg,
#4d6af3,
#4963ee
);

color:white;

position:fixed;
left:0;
top:0;
bottom:0;

}

.logo{

padding:25px;

font-size:18px;
font-weight:700;

border-bottom:1px solid rgba(255,255,255,.1);

}

.menu{

padding:20px 15px;

}

.menu a{

display:flex;
align-items:center;
gap:15px;

padding:15px 20px;

border-radius:15px;

text-decoration:none;
color:white;

margin-bottom:8px;

font-size:15px;

}

.menu a.active{

background:rgba(255,255,255,.15);

}

.menu a:hover{

background:rgba(255,255,255,.15);

}

.logout{

position:absolute;
bottom:25px;
width:100%;

padding:0 15px;

}

.content{

margin-left:255px;
width:100%;

}

.topbar{

height:90px;

background:white;

display:flex;

justify-content:space-between;
align-items:center;

padding:0 35px;

box-shadow:0 2px 10px rgba(0,0,0,.04);

}

.profile{

display:flex;
align-items:center;
gap:15px;

}

.circle{

width:45px;
height:45px;

background:#4d6af3;

border-radius:50%;

display:flex;
align-items:center;
justify-content:center;

color:white;
font-weight:bold;

}

.main{

padding:35px;

}

</style>

</head>

<body>

<div class="wrapper">

<div class="sidebar">

<div class="logo">

📖 SPP Admin <br>
Sekolah

</div>


<div class="menu">

<a href="#">
<i class="fa-solid fa-table-cells-large"></i>
Dashboard
</a>


<a href="#">
<i class="fa-regular fa-clipboard"></i>
Pembayaran
</a>


<a href="/siswa" class="active">
<i class="fa-solid fa-user-group"></i>
Data Siswa
</a>


<a href="#">
<i class="fa-solid fa-school"></i>
Data Kelas
</a>


<a href="#">
<i class="fa-regular fa-credit-card"></i>
Data SPP
</a>


<a href="#">
<i class="fa-regular fa-user"></i>
Data Petugas
</a>

</div>


<div class="logout">

<a href="#" class="menu active">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</div>



<div class="content">

<div class="topbar">

<div>

<h2
style="
font-size:17px;
font-weight:700;
margin-bottom:0;
">

SMK NEGERI 7 BALEENDAH

</h2>

<span style="color:gray">

Tahun Pelajaran 2025/2026

</span>

</div>


<div class="profile">

<div class="circle">

A

</div>

<div>

<div
style="font-weight:700">

Administrator

</div>

<div
style="color:gray">

Admin

</div>

</div>

</div>

</div>


<div class="main">

@yield('content')

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>