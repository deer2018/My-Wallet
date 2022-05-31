<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar" >

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-btc"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VRU My-wallet </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-circle"></i>
            <span>แดชบอร์ด</span></a>
    </li> --}}
     <li class="nav-item" >
        <a class="nav-link" href="{{ url('/dashboard2') }}">
            <i class="fas fa-circle"></i>
            <span style="color:black ; font-weight:bold" >แดชบอร์ด</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin_user') }}">
            <i class="fas fa-circle"></i>
            <span style="color:black ; font-weight:bold" >จัดการสมาชิก</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/category') }}">
            <i class="fas fa-circle"></i>
            <span style="color:black ; font-weight:bold" >จัดการหมวดหมู่</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/detail') }}">
            <i class="fas fa-circle"></i>
            <span>คำร้อง</span></a>
    </li> --}}
   

</ul>
<!-- End of Sidebar -->
