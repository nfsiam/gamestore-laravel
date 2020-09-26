
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="/admin">
                <span data-feather="home"></span>
                Dashboard for Admin {{session('username')}} <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/ratings">
                <span data-feather="file"></span>
                Game Ratings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/gamelist">
                <span data-feather="shopping-cart"></span>
                Game List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/userwalet">
                <span data-feather="users"></span>
                User Walet
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/users">
                <span data-feather="bar-chart-2"></span>
                All Users
              </a>
            </li>
          </ul>
        </div>
      </nav>
    