<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ $route === 'dashboard' ? '' : 'collapsed' }}" href="{{ url('/') }}">

          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        @if($route === 'barang' || $route === 'supplier' || $route === 'kategori')
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show " data-bs-parent="#sidebar-nav">
        @else
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        @endif
          <li>
            <a href="{{ url('/barang') }}" class="{{ $route === 'barang' ? "active" : "" }}">
              <i class="bi bi-circle"></i><span>Data Product</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/supplier') }}" class="{{ $route === 'supplier' ? "active" : "" }}">
              <i class="bi bi-circle"></i><span>Data Supplier</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/kategori') }}" class="{{ $route === 'kategori' ? "active" : "" }}">
              <i class="bi bi-circle"></i><span>Data Kategori</span>
            </a>
          </li>
        </ul>
      </li><!-- End Inventory Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $route === 'transaksi' ? '' : 'collapsed' }}" href="{{ url('/transaksi') }}">

          <i class="bi bi-cart"></i>
          <span>Transaksi</span>
        </a>
      </li><!-- End Transaksi Nav -->

      <li class="nav-heading">Administrator</li>

      <li class="nav-item">
        <a class="nav-link {{ $route === 'administrator' ? '' : 'collapsed' }}" href="/administrator/{{ auth()->user()->id }}">
          <i class="bi bi-person"></i>
          <span>Profil</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Logout Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
