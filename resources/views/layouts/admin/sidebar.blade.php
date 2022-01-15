
   <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
  
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-btc"></i>
        </div>
        <div class="sidebar-brand-text mx-3" >My-wallet </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
           
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin_user') }}">
                    <i class="fas fa-circle"></i>
                    <span>จัดการสมาชิก</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/category') }}">
                  <i class="fas fa-circle"></i>
                  <span>จัดการหมวดหมู่</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-circle"></i>
                    <span>แดชบอร์ด</span></a>
            </li>
           
          
   
    </ul>
    <!-- End of Sidebar -->
  