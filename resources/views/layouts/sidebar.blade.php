<div class="sidebar sidebar-style-2">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">

            <a href="index.html" class="logo">
                <img src="{{asset('admin')}}/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20">
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
                        <img src="{{asset('admin')}}/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="avatar avatar-minimize avatar-md mb-3 d-none">
                        <img src="{{asset('admin')}}/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <span class="user-name fw-bold mb-1">{{ Auth::user()->name }}</span>
                    <span class="user-level op-7">Director</span>
                </div>
                <div class="row menubars border-top border-bottom text-center no-gutters px-4">
                    <div class="col-4 border-right">
                        <a href="#" class="menubar p-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Notifications"><i class="fa fa-bell"></i></a>
                    </div>
                    <div class="col-4 border-right">
                        <a href="#" class="menubar p-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="menubar p-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Email"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            <!--User Profile-->
            <div class="nav-sidebar-scroll scrollbar scrollbar-inner">
                <ul class="nav nav-primary">
                    <!--Main Sidebar Menue-->
                    <li class="nav-item active">
                        <a href="{{route('dashboard')}}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <!--Client Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#client-nav">
                            <i class="fa fa-user"></i>
                            <p>Clients</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="client-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('client.create')}}">
                                        <i class="fa fa-user-plus"></i>
                                        <p>Add Client</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('client.index')}}">
                                        <i class="fa fa-users"></i>
                                        <p>Clients List</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--Domain and Hosting Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#domain-nav">
                            <i class="fa fa-cloud"></i>
                            <p>Domain and Hosting</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="domain-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('domain.index')}}">
                                        <i class="fa fa-globe"></i>
                                        <p>Domain</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('hosting.index')}}">
                                        <i class="fa fa-server"></i>
                                        <p>Hosting</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--To-Do Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#project-nav">
                            <i class="fa fa-briefcase"></i>
                            <p>Project</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="project-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="#">
                                        <span class="sub-item">p1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">p2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sub-item">p3</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                     <!--To-Do Menue-->
                     <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#project-employee-nav">
                            <i class="fa fa-users"></i>
                            <p>Employee</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="project-employee-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('companies.index')}}">
                                        <span class="sub-item">Company</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('department.index')}}">
                                        <span class="sub-item">Department</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('designation.index')}}">
                                        <span class="sub-item">Designation</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employees.index') }}">
                                        <span class="sub-item">Manage Employee</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                     <!--To-Do Menue-->
                     <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#project-team-nav">
                            <i class="fa fa-users"></i>
                            <p>Team</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="project-team-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('teams.index') }}">
                                        <span class="sub-item">Manage Team</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--To-Do Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#project-management-nav">
                            <i class="fa fa-briefcase"></i>
                            <p>Project Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="project-management-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('boards.index') }}">
                                        <span class="sub-item">Manage Board</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--To-Do Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#selling-nav">
                            <i class="fa fa-receipt"></i>
                            <p>Selling</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="selling-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="email-inbox.html">
                                        <i class=" fa fa-address-card"></i>
                                        <p>Company Information</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="email-compose.html">
                                        <i class=" fa fa-file-alt"></i>
                                        <p>Company Documents</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="email-detail.html">
                                        <i class=" fa fa-hdd"></i>
                                        <p>Hosting Package</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--Meeting Schedule Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#user-nav">
                            <i class="fa fa-user-tag"></i>
                            <p>User Role</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="user-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="messages.html">
                                        <i class="fa fa-user-edit"></i>
                                        <p>Create User</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="conversations.html">
                                        <i class="fa fa-id-badge"></i>
                                        <p>Role</p>
                                    </a>
                                </li><li>
                                    <a href="conversations.html">
                                        <i class="fa fa-key"></i>
                                        <p>Permission</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#ticket-nav">
                            <i class="fas fa-hands-helping"></i>
                            <p>Ticket </p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="ticket-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('category.index')}}">
                                        <i class="fas fa-edit"></i>
                                        <p>Category  </p>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('ticket.support.index')}}">
                                        <i class="fa fa-file"></i>
                                        <p>Support Ticket </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--Meeting Schedule Menue-->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#setup-nav">
                            <i class="fa fa-cog"></i>
                            <p>Set Up</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="setup-nav">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('company-information.index')}}">
                                        <i class="fa fa-info-circle"></i>
                                        <p>Company  Information</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('company-documents.index')}}">
                                        <i class="fa fa-file"></i>
                                        <p>Company Documents</p>
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
