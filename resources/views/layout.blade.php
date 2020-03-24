<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @section('css')
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free-5.12.1-web/css/all.css')}}">

    @show
</head>

<body>
    @section('sidebar')
    <div class="sidebar">
        <h1>SMS System</h1>
        <div class="logo">
            LOGO HERE
        </div>
        <ul>
            <a href="/">
                <li>Dashboard</li>
            </a>
            <a href="#" onclick="toggleDropdown()">
                <li>Manajemen Data <i class="fas fa-angle-left"></i></li>

            </a>
            <ul class="dropdown-data">
                <a href="/Management-Data/data-satuan-unit">
                    <li> Data Satuan Unit </li>
                </a>
                <a href="/Management-Data/data-kategori-barang">
                    <li> Data Kategori Barang </li>
                </a>
                <a href="/Management-Data/data-supplier">
                    <li> Data Pemasok </li>
                </a>
                <a href="/Management-Data/ data-gudang">
                    <li>Data Gudang </li>
                </a>
                <a href="/Management-Data/data-barang">
                    <li> Data Barang </li>
                </a>
            </ul>
            <a href="" onclick="togglePenyesuaian()">
                <li>Penyesuaian Stok <i class="fas fa-angle-left"></i></li>
            </a>
            <ul class="dropdown-penyesuaian">
                <li>Stok Masuk</li>
                <li>Stok Keluar</li>

            </ul>
            <a href="#">
                <li>Stok Opname</li>
            </a>
            <a href="#">
                <li>Transfer Stok</li>
            </a>
            <a href="#" onclick="toggleLaporan()">
                <li>Laporan <i class="fas fa-angle-left"></i></li>
            </a>
            <ul class="dropdown-laporan">
                <li>Laporan Kartu Stock</li>
                <li>Laporan Kartu Stock</li>
                <li>Laporan Kartu Stock</li>
                <li>Laporan Kartu Stock</li>
                <li>Laporan Kartu Stock</li>
            </ul>

            <a href="#" id="logout">
                <li>Logout </li>
            </a>
        </ul>
    </div>
    @show

    <div class="content">
        <div class="container">
            @section('content')
            <div class="top-menu">

                <a href="#" onclick="toggleSidebar()"> <i class="fas fa-bars"></i></a>
                <h3 id="header"></h3>
                <div class="user-info">
                    <h3>Arya Gamas Mahardika <i class="fas fa-user"></i></h3>
                    <p>Operator Gudang</p>

                </div>
            </div>
        </div>
        @show

    </div>
</body>
@section('scripts')


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    var menuAktif = document.querySelector('title').innerHTML.trim();
    var allMenus = document.querySelectorAll('.sidebar ul li');
    
    allMenus.forEach(menu => {
        
        let namaMenu = menu.innerText
        var mgmtData= /data*/i;
        if (namaMenu == menuAktif) {
            menu.classList.toggle('active')
        }else if (mgmtData.test(menuAktif)){
            if(menu.innerText.trim() == "Manajemen Data"){
                menu.classList.toggle('active')

            }
        }
        $('#header').html(menuAktif)
    });



    function toggleSidebar() {
        $(".sidebar").toggle("slide");
        
    }
    function toggleDropdown() {
       if ($(".dropdown-laporan").is(':visible')){
            $(".dropdown-laporan").slideToggle();

        }  $(".dropdown-data").slideToggle();
       

    }
   
    function togglePenyesuaian() {
        if ($(".dropdown-laporan").is(':visible')){
            $(".dropdown-laporan").slideToggle();

        }
        $(".dropdown-penyesuaian").slideToggle();
        
    }
    function toggleLaporan() {
        if ($(".dropdown-data").is(':visible') ) {
            $(".dropdown-data").slideToggle();

        }
        if ( $(".dropdown-penyesuaian").is(':visible')) {
            $(".dropdown-penyesuaian").slideToggle();

            
        }


        $(".dropdown-laporan").slideToggle();
        
    }
    
</script>

@show

</html>