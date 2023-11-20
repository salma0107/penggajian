<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', $title)</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
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
            background-image: url('/images/white-wall.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; 
        }
        .wrapper {
            display: flex;
        }
        .wrapper .sidebar {
            background: rgb(5, 68, 104);
            position: fixed;
            top: 0;
            left: 0;
            width: 320px;
            height: 100%;
            /* padding: 20px 0px; */
            transition: all 0.3s ease;
            overflow-y: auto;
            z-index: 2;
            /* margin-left:20px; */
            justify-content: center;
            /* margin-top: 25px; */
            /* border-radius: 15px; */
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
            padding: 5px 23px;
            color: rgb(241, 237, 237);
            font-size: 16px;
            position: relative;
            margin-bottom: 20px;
            margin-left: 0px;
            margin-right: 30px;
            text-decoration: none;
            transition: all 0.2s ease;
            align-items: center;
        }
        .wrapper .sidebar ul li a:hover,
        .wrapper .sidebar ul li a.active {
            color: #0c7db1;
            background: white;
            padding: 10px;
            margin left: 10px;
            border-radius: 20px;
            transition: all 0.2s ease;
        }

        .wrapper .sidebar ul li a span.item {
            margin-left: 10px; /* Adjust the initial left margin as needed */
            transition: margin-left 0.2s ease; /* add transition property for a 0.2s delay */
        }
        
        .wrapper .sidebar ul li a:hover span.icon,
        .wrapper .sidebar ul li a.active span.icon {
            margin-left: 25px;
            transition: margin-left 0.2s ease;
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
            /* transition: all 0.5s ease; */
            padding-left: 320px;
            /* margin-top: 25px; */
            padding-right: 0px;
            
        }
        .wrapper .section .top_navbar {
            background: rgb(5, 68, 104);
            height: 50px;
            /* width: 79%; */
            width: calc(100% - 320px);
            display: flex;
            align-items: center;
            padding: 0 30px;
            position: fixed;
            z-index: 3;
            /* border-radius: 20px; */

        }
        .full-width {
            width: 100% !important;
        }
        .wrapper .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            
        }
        
        .wrapper .section.active {
            padding-left: 0px; /* Hilangkan padding saat sidebar aktif */
        }
        
        @media (max-width: 500px) {
            .wrapper .sidebar {
                width: 90%;
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
            padding: 20px;
        }
        .container h1 {
            margin-bottom: 20px;
            text-align: center;
            margin-left: 20px;
        }
 
    </style>

</head>

<body>

    <div class="wrapper">
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
                    <a href="{{route('home.index')}}" >
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('calendar')}}">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">My Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.index') }}" >
                        <span class="icon"><i class="fas fa-money-check-alt"></i></span>
                        <span class="item">Penggajian</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('positions.index')}}">
                        <span class="icon"><i class="fas fa-user-tie"></i></span>
                        <span class="item">Data Jabatan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('tunjangans.index')}}">
                        <span class="icon"><i class="fas fa-money-bill"></i></span>
                        <span class="item">Data Tunjangan</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pegawais.index')}}">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Data Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('divises.index')}}">
                        <span class="icon"><i class="fas fa-sitemap"></i></span>
                        <span class="item">Data Divisi</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-chart-bar"></i></span>
                        <span class="item">Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('calendar')}}">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">My Calendar</span>
                    </a>
                </li>
                
            </ul>
            <div class="footer">
                <ul>
                    <li>
                        <a href="{{ route('password') }}">
                            <span class="icon"><i class="fas fa-key"></i></span>
                            <span class="item">Change Password</span>
                        </a>
                    </li>
                    <li style="margin-top: 20px;">
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
        const topNavbar = document.querySelector(".top_navbar");

        hamburgerToggle.addEventListener("click", function () {
            sidebar.classList.toggle("active");
            section.classList.toggle("active");
            topNavbar.classList.toggle("full-width");
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
