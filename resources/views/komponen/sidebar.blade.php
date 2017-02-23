<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
                  <!-- Authentication Links -->
                    @if (Auth::guest())
                        <div class="pull-left image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>

        <div class="pull-left info">
          
          
        </div>
      </div>
      <!-- search form -->               @else
                        <div class="pull-left image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>

        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
                    @endif
        <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Penggajian Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('karyawan')}}"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
            <li><a href="{{url('absen')}}"><i class="fa fa-circle-o"></i> Absen</a></li>
            <li><a href="{{url('gaji')}}"><i class="fa fa-circle-o"></i>Gaji</a></li>
          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>