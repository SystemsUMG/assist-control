<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <i class="fas fa-calendar-check text-white  fa-2x"></i>
            <span class="ms-2 font-weight-bold text-white">{{env('APP_NAME')}}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard','dashboard/*') ? ' active bg-gradient-primary' : '' }} "
                   href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Users Management
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('roles','roles/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('roles') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user-tag"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('permissions','permissions/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('permissions') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <span class="nav-link-text ms-1">Permissions</span>
                </a>
            </li>

            <li class="nav-item">
                <hr class="mx-3">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('centers','centers/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('centers') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <span class="nav-link-text ms-1">{!! __('crud.centers.name') !!}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('careers','careers/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('careers') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <span class="nav-link-text ms-1">{!! __('crud.careers.name') !!}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('semesters','semesters/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('semesters') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-list-ol"></i>
                    </div>
                    <span class="nav-link-text ms-1">{!! __('crud.semesters.name') !!}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('courses','courses/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('courses') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">{!! __('crud.courses.name') !!}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('students','students/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('students') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <span class="nav-link-text ms-1">{!! __('crud.students.name') !!}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('teachers','teachers/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('teachers') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('sections','sections/*') ? ' active bg-gradient-primary' : '' }}  "
                   href="{{ route('sections') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-down-a-z"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sections</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
