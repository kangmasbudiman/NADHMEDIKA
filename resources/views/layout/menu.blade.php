



  @if($user->level==1)
  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt" style="color:red;"></i>
      <p style="color:white;" >
        Dashboard
       
      </p>
    </a>
  
  </li>
  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt" style="color:red;"></i>
      <p style="color:white;">
        Transaksi
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ asset('/transaksi')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Transaksi Pendaftaran</p>
        </a>
      </li>

      
     
    </ul>
  </li>
  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt" style="color:red;"></i>
      <p style="color:white;">
        Master
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ asset('/user')}}" class="nav-link">
          <i class="far fa-person nav-icon" style="color:red;"></i>
          <p style="color:white;">Master User</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ asset('/profesi')}}" class="nav-link">
          <i class="far fa-user nav-icon" style="color:red;"></i>
          <p style="color:white;">Profesi</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ asset('/pendidikan')}}" class="nav-link">
          <i class="far fa-book nav-icon" style="color:red;"></i>
          <p style="color:white;">Data Pendidikan</p>
        </a>
      </li>
      
     
     
    </ul>
  </li>
  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt" style="color:red;"></i>
      <p style="color:white;">
        Kategori
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ asset('/kategoriperawatan')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Kategori  Perawatan</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ asset('/kategoriblog')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Kategori  Blog</p>
        </a>
      </li>
      
   
  
     
    </ul>
  </li>

  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"style="color:red;"></i>
      <p style="color:white;">
        Informasi & Edukasi
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ asset('/tentang')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Tentang Kami</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ asset('/blog')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Blog</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ asset('/slider')}}" class="nav-link">
          <i class="fas fa-fax nav-icon" style="color:red;"></i>
          <p style="color:white;">Slider</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ asset('/lowongan')}}" class="nav-link">
          <i class="fas fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Lowongan</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ asset('/hubungi')}}" class="nav-link">
          <i class="fas fa-fax nav-icon" style="color:red;"></i>
          <p style="color:white;">Hubungi Kami</p>
        </a>
      </li>

     
     
      
   
  
     
    </ul>
  </li>



  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      
      <i class="fas fa-list nav-icon" style="color:red;"></i>
      <p style="color:white;">
        Laporan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
     
      <li class="nav-item">
        <a href="{{ asset('/laporanjoblist')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Laporan Transaksi</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ asset('/laporanpendapatanuser')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Laporan Pendapatan User</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ asset('/testtest')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Controller <i class="mdi mdi-text-search:"></i></p>
        </a>
      </li>
    
  
     
    </ul>
  </li>
  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      
      <i class="fas fa-bars nav-icon" style="color:red;"></i>     
      
      <p style="color:white;">
        Setting
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ asset('/setting')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Aplikasi Setting</p>
        </a>
      </li>
   
    
  
     
    </ul>
  </li>

  @endif


  @if($user->level==2)
  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt" style="color:red;"></i>
      <p style="color:white;">
        MY DASHBOARD
       
      </p>
    </a>
  
  </li>

  <li class="nav-item">
    <a href="{{url('home')}}" class="nav-link">
      <i class="nav-icon fas fa-list-alt" style="color:red;"></i>
      <p style="color:white;">
        Pelayanan Kesehatan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ asset('pelayanan/')}}" class="nav-link">
          <i class="far fa-circle nav-icon" style="color:red;"></i>
          <p style="color:white;">Pilih Pelayanan</p>
        </a>
      </li>
     </ul>
  </li>


  @endif
  @if($user->level==3)
  <li class="nav-item">
    <a href="{{url('myhomecare')}}" class="nav-link">
      <i class="nav-icon fas fa-list" style="color:red;"></i>
      <p style="color:white;">
        My Home Care
      </p>
    </a>
  
  </li>
  @endif

  
  