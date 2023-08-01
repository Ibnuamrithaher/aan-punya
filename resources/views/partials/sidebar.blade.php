        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fire-extinguisher"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK FOGING</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Route::is('dashboard') ? 'active current-page' : '' }}">
                <a class="nav-link" href="{{ Route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Route::is('alternatif.*') ? 'active current-page' : '' }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>Alternatif</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Alternatif Components:</h6>
                        <a class="collapse-item" href="{{ Route('alternatif.index') }}">Alternatif</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ Route::is('category.*') ? 'active current-page' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryUtilities"
                    aria-expanded="true" aria-controls="categoryUtilities">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Kriteria</span>
                </a>
                <div id="categoryUtilities" class="collapse" aria-labelledby="headingCategory"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kriteria Utilities:</h6>
                        <a class="collapse-item" href="{{ Route('category.index') }}">Kriteria</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ Route::is('crips.*') ? 'active current-page' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cripsUtilities"
                    aria-expanded="true" aria-controls="cripsUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Crips / Nilai Kriteria</span>
                </a>
                <div id="cripsUtilities" class="collapse" aria-labelledby="headingCripts"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Crips / Nilai Kriteria:</h6>
                        <a class="collapse-item" href="{{ Route('crips.index') }}">Crips / Nilai Kriteria</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ Route::is('saw.*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#metodesaw"
                    aria-expanded="true" aria-controls="metodesaw">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span>S A W</span>
                </a>
                <div id="metodesaw" class="collapse " aria-labelledby="headingsaw"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">SIMPLE ADDITIVE WEIGHTING :</h6>
                        <a class="collapse-item" href="{{ Route('saw.hasil') }}">LAPORAN HASIL</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
