<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Menu WR. Barokah </title>
  <!-- Bootstrap core CSS -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/js/bootstrap.min.js') }}" rel="stylesheet">
    <link href="{{ asset('/css/frontend.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@500;600&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{{ asset('Navbar/style.css')}}">
        
        <!-- ===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

</head>
<header>
  <nav >
    <div class="nav-bar" >
        <i class='bx bx-menu sidebarOpen' ></i>
        <span class="logo navLogo"><a href="/home">WR.Barokah</a></span>

        <div class="menu" style="justify-content: center;justify-content: center;">
            <div class="logo-toggle">
                <span class="logo"><a href="/home">WR. Barokah</a></span>
                <i class='bx bx-x siderbarClose'></i>
            </div>

            <ul class="nav-links" >
                <li><a href="/home">Home</a></li>
                <li class="cart"><a href="{{ route('cart.list')}}">Keranjang</a></li>
                <li class="cart"><a href="{{ route('invoice.list')}}">Pesanan</a></li>
                <li><a href="/tentang">Tentang</a></li>
                <li><a href="/kontak">Kontak</a></li>
                <li class="logout"><a href="{{ route('logout.perform') }}">Logout</a></li>
            </ul>
        </div>

        <div class="darkLight-searchBox">
          <div class="order">
            <a href="{{ route('invoice.list')}}">
            <i class='bx bx-shopping-bag' style='color:#fffdfd;'></i>
          </a>
          </div>

            <div class="dark-light">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun'></i>
            </div>

            <div class="searchBox">
               <div class="searchToggle">
                  <i class='bx bx-x cancel'></i>
                  <i class='bx bx-search search'></i>
               </div>
                <form action="/home/cari" method="GET" class="search-field">
                  <input type="text"  name="cari" placeholder="Search..." value="{{ old('cari') }}">
                   <button type="submit" style="all:unset;margin-bottom: 28px;"><i class='bx bx-search' style="font-size: 30px;"></i></button>
                </form>
            </div>


            <div class="cart">
              <a href="{{ route('cart.list')}}">
              <i class='bx bx-cart' style='color:#fffdfd'  ></i>
            </a>
            </div>

            <div class="user">
              {{-- <i class='bx bx-user' style='color:#fffdfd'></i> --}}
              <a href="{{ route('logout.perform') }}">
              <i class='bx bx-log-in-circle' style='color:#fcfbfb'  ></i>
              </a>
            </div>
        </div>
    </div>
</nav>

<script src="{{ asset('Navbar/script.js')}}"></script>

</header>

<body>
  
    <main>
  
       @yield('content')
      
    </main>
{{-- 
    <footer class="container" style="background-color: #f2f2f5">
        <div class="row">
            <div class="col-12 py-4" style="color: #adb5bd">
                &copy; 2021 Tutorial Bootstrap
            </div>
        </div>
    </footer> --}}

</body>

</html>