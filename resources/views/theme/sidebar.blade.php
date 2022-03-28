

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('Home')}}" class="brand-link">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span class="brand-text font-weight-light">Go Pro</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{!! url::asset('theme/dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('Home')}}" class="d-block">Rushikesh Jadhav</a>
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
      <      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
           

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
              

              
                
            <li class="nav-item">
                 <?php   $last_req=last(request()->segments()); if($last_req == "CRUD"){  ?><a href="{{ url('CRUD')  }}" class="nav-link active"> <?php }else{ ?><a href="{{ url('CRUD')  }}" class="nav-link"> <?php   }     ?>

                  <i class="far fa-circle nav-icon"></i>
                  <p>CRUD</p>
                </a>
              </li>


              <li class="nav-item">
              

 <?php   $last_req=last(request()->segments()); if($last_req == "ajax"){  ?><a href="{{ url('ajax')  }}" class="nav-link active"> <?php }else{ ?><a href="{{ url('ajax')  }}" class="nav-link"> <?php   }     ?>

                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajax</p>
                </a>
              </li>
             

             <li class="nav-item">
              

 <?php   $last_req=last(request()->segments()); if($last_req == "File-Import"){  ?><a href="{{ url('File-Import')  }}" class="nav-link active"> <?php }else{ ?><a href="{{ url('File-Import')  }}" class="nav-link"> <?php   }     ?>

                  <i class="far fa-circle nav-icon"></i>
                  <p>File Import</p>
                </a>
              </li>


              <li class="nav-item">
              

                <?php   $last_req=last(request()->segments()); if($last_req == "AutoCity"){  ?><a href="{{ url('AutoCity')  }}" class="nav-link active"> <?php }else{ ?><a href="{{ url('AutoCity')  }}" class="nav-link"> <?php   }     ?>
               
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Auto City</p>
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
