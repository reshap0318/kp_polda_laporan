<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="{{url('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>SIM-ASSET</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      @if(is_null(Sentinel::getUser()->avatar)||Sentinel::getUser()->avatar=="")
        <img src="{{ asset('/img/lea.png') }}" alt="..." class="img-circle profile_img">
      @else
        <img src="{{ url('avatar/profile-pict/'.Sentinel::getUser()->avatar) }}" alt="..." class="img-circle profile_img" style="height: 70px;width: 70px">
      @endif

    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{Sentinel::getuser()->nama}}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        @if (Sentinel::getUser()->hasAccess(['user.index','role.index']))
          <li class=""><a><i class="fa fa-users"></i>Users Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display:none;">
              @if (Sentinel::getUser()->hasAccess(['user.index']))
                <li><a href="{{route('user.index')}}">User</a></li>
              @endif
              @if(Sentinel::getUser()->hasAccess(['role.index']))
              <li><a href="{{route('role.index')}}">Role</a></li>
              @endif
            </ul>
          </li>
        @endif
          <li class=""><a><i class="fa fa-envelope"></i>Pesan <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Pengaduan Masyarakat</a></li>
                <li><a href="#">Pengaduan Pungli</a></li>
                <li><a href="#">Pengaduan Penanganan Perkara</a></li>
              </ul>
          </li>
          <li class=""><a><i class="fa fa-file-text-o"></i>Laporan <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#">Pengaduan Masyarakat</a></li>
                <li><a href="#">Pengaduan Pungli</a></li>
                <li><a href="#">Pengaduan Penanganan Perkara</a></li>
              </ul>
          </li>
          <li class=""><a href="{{ url('My-QrCode') }}"><i class="fa fa-qrcode"></i>My QR-Code</a></li>
      </ul>
    </div>

  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  <!-- /menu footer buttons -->
</div>
