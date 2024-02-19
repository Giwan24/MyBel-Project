<nav class="navbar navbar-expand-lg main-navbar" style="background-color:#5d7b71;">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3" >
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            @if (Auth::guard('admin')->user()->level == 'admin')
              <img alt="image" src="{{ asset('assets/img/avatar/avatar-2.png') }}" class="rounded-circle mr-1">
            @endif
            @if (Auth::guard('admin')->user()->level == 'petugas')
              <img alt="image" src="{{ asset('assets/img/avatar/avatar-4.png') }}" class="rounded-circle mr-1">
            @endif
            <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('admin')->user()->nama_petugas }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>