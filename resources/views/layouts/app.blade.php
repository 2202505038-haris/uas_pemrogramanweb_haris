<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    @include('partials.sidebar')

    <div class="admin-main">
      @include('partials.navbar')

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert" style="border-left: 4px solid #2ecc71 !important;">
              <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2" style="font-size: 1.2rem; color: #2ecc71;"></i>
                <div>
                  {{ session('success') }}
                </div>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @yield('content')
        </div>
      </main>

      @include('partials.footer')
    </div>
  </div>

  @include('partials.scripts')
</body>
</html>