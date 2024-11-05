    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="#" class="text-nowrap logo-img">
                    <img src="admin/images/logos/IdeaThings.png" width="180" alt="" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="home" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">FITUR</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false" data-toggle="collapse" data-target="#courseDropdown">
                            <span>
                                <i class="ti ti-file-description"></i>
                            </span>
                            <span class="hide-menu">All Course</span>
                        </a>
                        <!-- Dropdown menu items -->
                        <ul id="courseDropdown" class="collapse list-unstyled">
                            <li class="sidebar-subitem">
                                <a href="course" class="sidebar-link subitem-link">
                                    <span class="hide-menu">Courses</span>
                                </a>
                            </li>
                            <li class="sidebar-subitem">
                                <a href="content" class="sidebar-link subitem-link">
                                    <span class="hide-menu">Course Content</span>
                                </a>
                            </li>
                            <li class="sidebar-subitem">
                                <a href="kategori" class="sidebar-link subitem-link">
                                    <span class="hide-menu">Course Kategori</span>
                                </a>
                            </li>
                            <li class="sidebar-subitem">
                                <a href="section" class="sidebar-link subitem-link">
                                    <span class="hide-menu">Course Section</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="user" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-description"></i>
                            </span>
                            <span class="hide-menu">Data User</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="payment" aria-expanded="false">
                            <span>
                                <i class="ti ti-cards"></i>
                            </span>
                            <span class="hide-menu">Payment</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="instructor" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-description"></i>
                            </span>
                            <span class="hide-menu">Data instructor</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="rating" aria-expanded="false">
                            <span>
                                <i class="ti ti-star"></i>
                            </span>
                            <span class="hide-menu">Rating / Ulasan</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" href="kategori" aria-expanded="false">
                            <span>
                                <i class="ti ti-star"></i>
                            </span>
                            <span class="hide-menu">Kategori</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
