<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('surat/index') }}" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Arsip
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('kategori/index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori Surat
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('about/index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                About
              </p>
            </a>
        </li>
    </ul>
</nav>