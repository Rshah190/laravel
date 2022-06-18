<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{url('admin/dashboard')}}" class="brand-link">
   <img src="{{asset('assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Admin Panel</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            @if(empty(auth()->user()->image))
            <img src="{{asset('assets/backend/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
            @elseif(!empty(auth()->user()->image))
            <img class="img-circle elevation-2" alt="User Image"
               src="{{asset('assets/backend/images/'.auth()->user()->image)}}"
               id="imgPreview">
            @endif
         </div>
         <div class="info">
            <a href="{{url('/admin/dashboard')}}" class="d-block">{{auth()->user()->first_name}}  {{auth()->user()->last_name}}</a>
         </div>
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar">
               <i class="fas fa-search fa-fw"></i>
               </button>
            </div>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
               <a href="{{url('/admin/dashboard')}}" class="{{request()->url()==url('/admin/dashboard')?"nav-link active":"nav-link" }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
               <li class="nav-item">
                     <a href="{{url('admin/dashboard')}}" class="{{request()->url()==url('/admin/dashboard')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                     </a>
                  </li>  
               </ul>
            </li>
            
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                     Clients
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add/client')}}" class="{{request()->url()==url('/admin/add/client')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Client</p>
                     </a>
                  </li>  
                  <li class="nav-item">
                     <a href="{{url('admin/list/clients')}}" class="{{request()->url()==url('/admin/list/clients')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Clients</p>
                     </a>
                  </li>         
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-car"></i>
                  <p>
                     Cars 
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add/car')}}" class="{{request()->url()==url('/admin/add/car')?"nav-link active":"nav-link" }}">
                     <i class="far fa-circle nav-icon"></i>
                        <p>Add Car</p>
                     </a>
                  </li>         
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/list/cars')}}" class="{{request()->url()==url('/admin/list/cars')?"nav-link active":"nav-link" }}">
                     <i class="far fa-circle nav-icon"></i>
                        <p>List of Cars</p>
                     </a>
                  </li>         
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-car-crash"></i>
                  <p>
                     Damage Reports 
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add/damage/report')}}" class="{{request()->url()==url('/admin/add/damage/report')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Damage</p>
                     </a>
                  </li>         
               </ul>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/list/damage/reports')}}" class="{{request()->url()==url('/admin/list/damage/reports')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of Damage Reports</p>
                     </a>
                  </li>         
               </ul>
            </li>
         
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    Contracts
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add/contract')}}" class="{{request()->url()==url('/admin/add/contract')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Contract</p>
                     </a>
                  </li>   
                  <li class="nav-item">
                     <a href="{{url('admin/list/contracts')}}" class="{{request()->url()==url('/admin/list/contracts')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Contracts</p>
                     </a>
                  </li>
                        
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-file-invoice"></i>
                  <p>
                    Invoices
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add/invoice')}}" class="{{request()->url()==url('/admin/add/category')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Invoice</p>
                     </a>
                  </li>   
                  <li class="nav-item">
                     <a href="{{url('admin/list/invoices')}}" class="{{request()->url()==url('/admin/list/categories')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Invoices</p>
                     </a>
                  </li>
                        
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                     Settings
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/profile')}}"  class="{{request()->url()==url('/admin/profile')?"nav-link active":"nav-link" }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>My Profile</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('/admin/logout')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Logout</p>
                     </a>
                  </li>
                 
                
               </ul>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>