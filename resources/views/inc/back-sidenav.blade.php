<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="{{ asset('front/images/logo.png') }}" class="header-logo" /> 
            	{{-- <span
                class="logo-name">LoveChannels</span> --}}
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="calendar"></i><span>Manage Events</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('events.create') }}">Create Event</a></li>
                <li><a class="nav-link" href="{{ route('events.index') }}">View Events</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="grid"></i><span> Shop Categories</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('categories.create') }}">Create Category</a></li>
                <li><a class="nav-link" href="{{ route('categories.index') }}">View Categories</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span> Shop</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('products.create') }}">Add Product</a></li>
                <li><a class="nav-link" href="{{ route('products.index') }}">View Products</a></li>
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="tv"></i><span> Live Streaming</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('livestreams.create') }}">Add LiveStream</a></li>
                <li><a class="nav-link" href="{{ route('livestreams.index') }}">View LiveStream</a></li>
              </ul>
            </li>

            <li>
                <a class=" nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i data-feather="log-out">
                    </i>
                    <span>
                        Logout
                    </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                
            </li>
            
           
          </ul>
        </aside>
      </div>