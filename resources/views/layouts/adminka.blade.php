<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('images/avatars/mylogo.png')}}" rel="icon">
  <title>Ксения Студия - Админ панель</title>
  <!-- Font Awesome -->
  <link href="{{asset('publicsite/fontawesome-free-6.2.1-web/css/all.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('dashboard/css/ruang-admin.min.css')}}" rel="stylesheet">
  {{-- Datatable --}}
  <link href="{{asset('dashboard/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{asset('dashboard/css/dmitry.css')}}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img src="images/avatars/mylogo.png">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">На сайт</div> --}}
      </a>
      @cannot('isUser')
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
          <a class="nav-link" href="adminka">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Админка</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Опции
        </div>
        @can('isAdmin')
          <li class="nav-item">
            <a class="nav-link collapsed" href="/listUsers" >
              <i class="fas fa-users"></i>
              <span>Пользователи</span>
            </a>
          </li>
        @endcan
        <li class="nav-item">
          <a class="nav-link collapsed" href="/listCategories">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Категории</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="/listtestimonials">
            <i class="fas fa-comments"></i>
            <span>Отзывы</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/listcomments">
            <i class="fas fa-comment-dots"></i>
            <span>Комментарии</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/listimages">
            <i class="fas fa-images"></i>
            <span>Галерея</span>
          </a>
        </li>
        <hr class="sidebar-divider">
      @endcannot
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="/images/avatars/{{Auth::user()->avatar}}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              @cannot('isUser')
              <a class="dropdown-item" href="profile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Профиль
              </a>
              <div class="dropdown-divider"></div>
              @endcannot
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Выйти
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
{{-- //--------------------------------------------------- --}}
          <div class="row mb-3 justify-content-center">
            @yield('content')
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Уверены, что хотите выйти?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Остаться</button>
                  <a href="logout" class="btn btn-primary">Выйти</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a >DK</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('dashboard/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('dashboard/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dashboard/bootstrap/js/docs.min.js')}}"></script>
  <script src="{{asset('dashboard/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('dashboard/js/ruang-admin.min.js')}}"></script>
  <!-- Page level plugins -->
  <script src="{{asset('dashboard/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('dashboard/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // #dataTable - ID From dataTable 
    });
  </script>



</body>

</html>