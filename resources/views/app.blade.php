<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', $title)</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


  <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
        * {
            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }
        body {
            background: white;
            /* background-image: url('/images/blue.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; */
        }
        .wrapper {
            display: flex;
        }
        .wrapper .sidebar {
            background: rgb(5, 68, 104);
            position: fixed;
            top: 0;
            left: 0;
            width: 300px;
            height: 100%;
            padding: 20px 0px;
            transition: all 0.3s ease;
            overflow-y: auto;
            z-index: 2; 
            background-image: url('/images/blue.jpg');
        }
        .wrapper .sidebar.active {
            width: 0;
        }
        .wrapper .sidebar .profile {
            margin-top: 30px;
            margin-bottom: 35px;
            text-align: center;
        }
        .wrapper .sidebar .profile img {
            display: block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto;
        }
        .wrapper .sidebar .profile h3 {
            color: #ffffff;
            margin: 10px 0 5px;
        }
        .wrapper .sidebar .profile p {
            color: rgb(206, 240, 253);
            font-size: 14px;
        }
        .wrapper .sidebar ul li a {
            display: block;
            padding: 10px 23px;
            /* border-bottom: 1px solid #10558d; */
            color: rgb(241, 237, 237);
            font-size: 16px;
            position: relative;
            margin-bottom: 15px;
            margin-left: -5px;
            margin-right: 30px;
            text-decoration: none;
        }
        .wrapper .sidebar ul li a:hover,
        .wrapper .sidebar ul li a.active {
            color: #0c7db1;
            background: white;
            border-radius: 20px;
        }
        .wrapper .sidebar ul li a:hover .icon,
        .wrapper .sidebar ul li a.active .icon {
            color: #0c7db1;
        }
        .wrapper .sidebar ul li a:hover:before,
        .wrapper .sidebar ul li a.active:before {
            display: block;
        }
        .wrapper .sidebar ul li a .icon {
            color: #dee4ec;
            width: 30px;
            display: inline-block;
        }
        .wrapper .section {
            flex: 1;
            transition: all 0.5s ease;
            padding-left: 300px; /* Tambahkan padding untuk memberi ruang pada sidebar */
        }
        .wrapper .section .top_navbar {
            background: rgb(5, 68, 104);
            height: 50px;
            width: 100%; /* Sesuaikan lebar sesuai dengan padding sidebar */
            display: flex;
            align-items: center;
            padding: 0 30px;
            position: fixed;
            z-index: 3; /* Tambahkan z-index agar tetap di atas konten lain */
        }
        .wrapper .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        /* Tambahkan CSS untuk konten utama saat sidebar aktif */
        .wrapper .section.active {
            padding-left: 0px; /* Hilangkan padding saat sidebar aktif */
        }
        /* Tambahkan CSS untuk menyembunyikan sidebar pada layar yang lebih kecil */
        @media (max-width: 500px) {
            .wrapper .sidebar {
                width: 100%;
                /* width: 0; */
                /* padding: 0; */
            }
            .wrapper .section.active {
                padding-left: 0px;
                width: 100%;
            }
            .container {
                margin: 100px 10px; 
                max-width: none; 
            }
        }
        .hamburger i {
            color: white;
            transition: color 0.3s;
        }

        .hamburger i:hover {
            color: gray;
        }

        .container {
            margin: 50px 10px;
            max-width: 100%;
            padding: 20px; */
            background: red;
        }
        .container h1 {
            margin-bottom: 20px; /* Add margin-bottom to create space below the h1 element */
            text-align: center;
            margin-left: 20px;
        }
 
    </style>

</head>

<body>

    <div class="wrapper">
        <!--Top menu -->
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
        @auth
        <div class="sidebar">
            <div class="profile">
                <img src="/images/user.png" alt="user">
                <h3>Selamat Datang</h3>
                <p>{{ Auth::user()->name }}</p>
            </div>
            <ul>
                <li>
                    <a href="{{ route('home') }}" >
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.index')}}" >
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('positions.index')}}">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Data Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('tunjangans.index')}}">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Data Tunjangan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pegawais.index')}}">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Data Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('divisis.index')}}">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Data Divisi</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('password') }}">
                        <span class="icon"><i class="fas fa-key"></i></span>
                        <span class="item">Change Password</span>
                    </a>
                </li>
            </ul>
            <div class="footer">
                <ul>
                    <li>
                        <a href="{{ route('logout') }}">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="item">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endauth
        <div class="container">
            <!-- <h1>@yield('title', $title)</h1> -->
            @yield('content')
        </div>
    </div>

    
<script>
    const hamburgerToggle = document.querySelector(".hamburger a");
    const sidebar = document.querySelector(".sidebar");
    const section = document.querySelector(".section");
    hamburgerToggle.addEventListener("click", function () {
        sidebar.classList.toggle("active");
        section.classList.toggle("active");
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="hhttps://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>
</html>
