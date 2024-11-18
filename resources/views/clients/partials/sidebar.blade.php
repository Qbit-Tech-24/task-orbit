<div class="sidebar sidebar-style-2">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="#" class="logo">
                <img src="{{ asset('admin') }}/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                    height="20">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>

        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper">
        <div class="sidebar-content">
            <!--User Profile-->
            <div class="profile-section">
                <div class="user-profile d-flex flex-column align-items-center text-center py-4">
                    <div class="avatar avatar-xl mb-3">
                        <img src="{{ asset('admin') }}/img/profile2.jpg" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                    <div class="avatar avatar-minimize avatar-md mb-3 d-none">
                        <img src="{{ asset('admin') }}/img/profile2.jpg" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                    <span class="user-name fw-bold mb-1">{{ Auth::guard('clinetuser')->user()->name }}</span>
                    <span class="user-level op-7">Director</span>
                </div>
                <div class="row menubars border-top border-bottom text-center no-gutters px-4">
                    <div class="col-4 border-right">
                        <a href="#" class="menubar p-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="Notifications"><i class="fa fa-bell"></i></a>
                    </div>
                    <div class="col-4 border-right">
                        <a href="#" class="menubar p-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="menubar p-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="Email"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            <!--User Profile-->
            <div class="nav-sidebar-scroll scrollbar scrollbar-inner">
                <ul class="nav nav-primary">
                    <!--Main Sidebar Menue-->
                    <li class="nav-item active">
                        <a href="{{ route('client.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                  
                    <!--Domain and Hosting Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Support Ticket</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('open.support_ticket') }}">
                                        <span class="sub-item">Open Support Ticket</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('support_ticket.all') }}">
                                        <span class="sub-item">Manage Support Ticket</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                   
                  
                </ul>
            </div>
        </div>
    </div>
</div>
