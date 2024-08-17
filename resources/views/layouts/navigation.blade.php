<div class="d-flex flex-column h-100">
    <div class="flex-shrink-1 sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html " target="_blank">
            <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Tape Quiz</span>
        </a>
    </div>
    <hr class="flex-shrink-1 horizontal dark mt-0">
    <div class="flex-grow-1 collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a  href="{{route('admin.dashboard')}}" class="nav-link @if(request()->routeIs('admin.dashboard'))active @endif" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a  href="{{route('admin.messages.index')}}" class="nav-link @if(request()->routeIs('admin.messages.index'))active @endif" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Messages</span>
                </a>
            </li>
            <li class="nav-item">
                <a  href="{{route('admin.quiz.index')}}" class="nav-link @if(request()->routeIs('admin.quiz.index'))active @endif" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quiz</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 my-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <div class="w-100 d-flex justify-center">
                <img class="mx-auto" src="https://branham.org/branham/images/wheatonly.png" alt="sidebar_illustration">
            </div>
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Powered by</h6>
                    <p class="text-xs font-weight-bold mb-0">Voice of God Recordings</p>
                </div>
            </div>
        </div>
    </div>

</div>
