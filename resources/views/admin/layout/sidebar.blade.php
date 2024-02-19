<div class="main-sidebar" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #5d7b71;">
  <aside id="sidebar-wrapper" style="background-color: #5d7b71;">
  <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <div class="sidebar-brand">
      <br>
      <a href="index.html" class="text-light" style="color:white;"><img src="../assets/images/mybel.png" alt="logo" width="90" ><br><b>MyBel</b></a>
    </div>
    <br><br><br>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html" class="text-light" style="color:white;"><b>PI</b></a>
    </div>
      <ul class="sidebar-menu">
        {{-- dashboard --}}
        <li class="menu-header" ><b>Dashboard</b></li>
        <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span><h7>Dashboard</h7></span></a></li>
        
        {{-- Transaksi --}}
        <li class="menu-header text-light"><b>transaksi</b></li>
        <li class="@yield('transaksi')"><a class="nav-link" href="#"><i class="fas fa-donate"></i> <span>Pembayaran</span></a></li>

        @if (Auth::guard('admin')->user()->level == 'admin')
        <li class="menu-header"><b>Entry data</b></li>
        <li class="@yield('mybel')"><a class="nav-link" href="/mybel"><i class="fas fa-user"></i> <span>Produk MyBel</span></a></li>
        <li class="@yield('petugas')"><a class="nav-link" href="/petugas"><i class="fas fa-user"></i> <span>Admin</span></a></li>
        @endif      
      </ul>
  </aside>
</div>