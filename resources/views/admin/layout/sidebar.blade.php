<div class="main-sidebar" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #2d3440;">
  <aside id="sidebar-wrapper" style="background-color: #2d3440;">
    <div class="sidebar-brand">
      <br>
      <a href="index.html" class="text-light" style="color:white;"><img src="../assets/img/logosmk.png" alt="logo" width="90" class="shadow-sm rounded-circle"><br><b>SMK PI</b></a>
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
        <li class="@yield('transaksi')"><a class="nav-link" href="/transaksi_cari?_token=JEehRkjvZW9nwyjlvHo72kxQNKG5Co1uZdg9F8o8&keyword=20103424"><i class="fas fa-donate"></i> <span>Pembayaran</span></a></li>
        
        @if (Auth::guard('admin')->user()->level == 'petugas')
        <li class="@yield('siswa') text-light"><a class="nav-link" href="/siswa"><i class="fas fa-address-book"></i> <span>Riwayat</span></a></li>
        @endif

        @if (Auth::guard('admin')->user()->level == 'admin')
        <li class="menu-header"><b>Entry data</b></li>
        <li class="@yield('siswa')"><a class="nav-link" href="/siswa"><i class="fas fa-user"></i> <span>Siswa</span></a></li>
        <li class="@yield('kelas')"><a class="nav-link" href="/kelas"><i class="fas fa-user"></i> <span>Kelas</span></a></li>
        <li class="@yield('petugas')"><a class="nav-link" href="/petugas"><i class="fas fa-user"></i> <span>Petugas</span></a></li>
        <li class="@yield('spp')"><a class="nav-link" href="/spp"><i class="fas fa-user"></i> <span>SPP</span></a></li>

        {{-- Laporan --}}
        <li class="menu-header" style="background-color: #2d3440;"><b>Laporan</b></li>
        <li class="@yield('data_guru')"><a class="nav-link" href="/data_guru"><i class="fas fa-address-book"></i> <span>Data Petugas</span></a></li>
        <li class="@yield('data_siswa')"><a class="nav-link" href="/data_siswa"><i class="fas fa-address-book"></i> <span>Data Siswa</span></a></li>
        <li class="@yield('laporan')"><a class="nav-link" href="/rekap"><i class="fas fa-database"></i> <span>Pembayaran</span></a></li>
        @endif
        {{-- Entry data --}}        
      </ul>
  </aside>
</div>