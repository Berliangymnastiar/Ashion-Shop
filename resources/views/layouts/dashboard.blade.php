<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  @stack('prepend-style')
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
  <link href="/style/main.css" rel="stylesheet" />
  @stack('addon-style')

</head>

<body>
  @php
      $user = Auth::user();
  @endphp
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- sidebar -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="{{ Storage::url($user->avatar) }}" alt="" class="my-4" style="max-width: 120px">
        </div>
        <div class="list-group list-group-flush">
          <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/dashboard*')) ? 'active' : ''  }}">
            Dashboard
          </a>
          <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : ''  }}">
            Products
          </a>
          <a href="{{ route('product-gallery.index') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/products-galleries*')) ? 'active' : ''  }}">
            Products Galleries
          </a>
          <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/categories*')) ? 'active' : ''  }}">
            Categories
          </a>
          <a href="{{ route('dashboard-transaction') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/transactions*')) ? 'active' : ''  }}">
            Transactions
          </a>
          <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/users*')) ? 'active' : ''  }}">
            Users
          </a>
          <a href="{{ route('dashboard-settings-store') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/account-settings*')) ? 'active' : ''  }}">
            My Account
          </a>
          <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
              Sign Out
          </a>
        </div>
      </div>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
          <div class="container-fluid">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
              &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Desktop menu -->
              <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                    <img src="{{ Storage::url($user->avatar) }}" alt="" class="rounded-circle mr-2 profile-picture" />
                    Hai, {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu">
                    <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}</a>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST"   style="display: none;">
                    @csrf
                  </form>
                </li>
                {{-- <li class="nav-item">
                  <a href="#" class="nav-link d-inline-block mt-2">
                    @php
                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp
                    @if ($carts > 0)
                      <img src="/images/logo-cart-filled.svg" alt="" />
                      <div class="card-badge">{{ $carts }}</div>
                    @else
                    <img src="/images/logo-cart-empty.svg" alt="" />
                    @endif
                  </a>
                </li> --}}
              </ul>

              <!-- Mobile menu -->
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      Hi, {{ Auth::user()->name }}
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link d-inline-block">
                      Cart
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        {{-- Content --}}
        @yield('content')

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    })
  </script>
  <script src="/script/navbar-scroll.js"></script>
 @stack('addon-script')
</body>

</html>