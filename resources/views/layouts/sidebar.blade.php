<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block mt-3 bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          @foreach($sidebarItems as $sidebarItem)
          <li class="nav-item">
            <a class="nav-link active" href="/dashboard">
              <span data-feather="home"></span>
              {{$sidebarItem}}<span class="sr-only">(current)</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </nav>