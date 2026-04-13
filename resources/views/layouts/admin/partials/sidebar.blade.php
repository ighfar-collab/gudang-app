<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
           <b> Aplikasi Monitoring Gudang</b>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
  
                    <ul class="sidebar-menu">
                <li class="menu-header"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
           
            <li class="menu-header" >Master Data</li>
                       <li class="active"><a class="nav-link" href="{{ route('barang.index') }}"><i class="far fa-square"></i>
                    <span>Barang</span></a></li>
               <li class="active"><a class="nav-link" href="{{ route('mutasi.index') }}"><i class="far fa-square"></i>
                    <span>Mutasi Barang</span></a></li>          
                      <li class="active"><a class="nav-link" href="{{ route('gudang.index') }}"><i class="far fa-square"></i>
                    <span>Gudang</span></a></li>   
                                   <li class="active"><a class="nav-link" href="{{ route('stok.index') }}"><i class="far fa-square"></i>
                    <span>Stok</span></a></li>  
                                      <li class="active"><a class="nav-link" href="{{ route('supplier.index') }}"><i class="far fa-square"></i>
                    <span>Supplier</span></a></li>  
                        <li class="active"><a class="nav-link" href="{{ route('mutasi.masuk') }}"><i class="far fa-square"></i>
                    <span>Barang Masuk</span></a></li>  
                       <li class="active"><a class="nav-link" href="{{ route('mutasi.keluar') }}"><i class="far fa-square"></i>
                    <span>Barang Keluar</span></a></li>  
                        <li class="menu-header" >Laporan</li>
                       <li class="active"><a class="nav-link" href="{{ route('laporan.masuk') }}"><i class="far fa-square"></i>
                    <span>Laporan Barang Masuk</span></a></li>
                               <li class="active"><a class="nav-link" href="{{ route('laporan.keluar') }}"><i class="far fa-square"></i>
                    <span>Laporan Barang Keluar</span></a></li>                                       
                                                      
                    <li class="menu-header"><a class="nav-link" href="{{ route('user.index') }}">Admin</a></li>
                
        </ul>

    </aside>
</div>