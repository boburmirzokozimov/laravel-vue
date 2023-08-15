<script setup>

</script>

<template>
    <div>
        <!-- Page Container -->
        <!--
          Available classes for #page-container:

          GENERIC

            'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                        - Theme helper buttons [data-toggle="theme"],
                                                        - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                        - ..and/or Codebase.layout('dark_mode_[on/off/toggle]')

          SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

          HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

          HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-dark'                          Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-dark'        Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

          MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

          DARK MODE

            'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
        -->
        <div id="page-container"
             class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header bg-primary-dark">
                    <!-- User Avatar -->
                    <a class="img-link me-2" href="be_pages_generic_profile.html">
                        <img alt="" class="img-avatar img-avatar32" src="assets/media/avatars/avatar12.jpg">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <a class="link-fx text-white fw-semibold fs-sm" href="be_pages_generic_profile.html">
                        Admin
                    </a>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button class="btn btn-sm btn-alt-danger ms-auto" data-action="side_overlay_close"
                            data-toggle="layout"
                            type="button">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <!-- Mini Stats -->
                    <div class="block pull-t pull-x">
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Sales</div>
                                    <div class="fs-4">985</div>
                                </div>
                                <div class="col-4">
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Tickets</div>
                                    <div class="fs-4">251</div>
                                </div>
                                <div class="col-4">
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Projects</div>
                                    <div class="fs-4">39</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Mini Stats -->

                    <!-- Search -->
                    <div class="block pull-x">
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <form>
                                <div class="input-group">
                                    <input id="side-overlay-search" class="form-control" name="side-overlay-search"
                                           placeholder="Search.." type="text">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Search -->

                    <!-- Notifications -->
                    <div class="block pull-x">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">Notifications</h3>
                            <div class="block-options">
                                <button class="btn-block-option" data-action="state_toggle" data-action-mode="demo"
                                        data-toggle="block-option" type="button">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button class="btn-block-option" data-action="content_toggle" data-toggle="block-option"
                                        type="button"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <ul class="list list-activity mb-0">
                                <li>
                                    <i class="si si-wallet text-success"></i>
                                    <div class="fs-sm fw-semibold">+$29 New sale</div>
                                    <div class="fs-sm">
                                        <a href="javascript:void(0)">Admin Template</a>
                                    </div>
                                    <div class="fs-xs text-muted">5 min ago</div>
                                </li>
                                <li>
                                    <i class="si si-close text-danger"></i>
                                    <div class="fs-sm fw-semibold">Project removed</div>
                                    <div class="fs-sm">
                                        <a href="javascript:void(0)">Best Icon Set</a>
                                    </div>
                                    <div class="fs-xs text-muted">26 min ago</div>
                                </li>
                                <li>
                                    <i class="si si-pencil text-info"></i>
                                    <div class="fs-sm fw-semibold">You edited the file</div>
                                    <div class="fs-sm">
                                        <a href="javascript:void(0)">
                                            <i class="fa fa-file-alt"></i> Docs.doc
                                        </a>
                                    </div>
                                    <div class="fs-xs text-muted">3 hours ago</div>
                                </li>
                                <li>
                                    <i class="si si-plus text-success"></i>
                                    <div class="fs-sm fw-semibold">New user</div>
                                    <div class="fs-sm">
                                        <a href="javascript:void(0)">StudioWeb - View Profile</a>
                                    </div>
                                    <div class="fs-xs text-muted">5 hours ago</div>
                                </li>
                                <li>
                                    <i class="si si-wrench text-warning"></i>
                                    <div class="fs-sm fw-semibold">App v5.5 is available</div>
                                    <div class="fs-sm">
                                        <a href="javascript:void(0)">Update now</a>
                                    </div>
                                    <div class="fs-xs text-muted">8 hours ago</div>
                                </li>
                                <li>
                                    <i class="si si-user-follow text-pulse"></i>
                                    <div class="fs-sm fw-semibold">+1 Friend Request</div>
                                    <div class="fs-sm">
                                        <a href="javascript:void(0)">Accept</a>
                                    </div>
                                    <div class="fs-xs text-muted">1 day ago</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Notifications -->
                </div>
                <!-- END Side Content -->
            </aside>

            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header justify-content-lg-center bg-black-10">
                        <!-- Logo -->
                        <div>
              <span class="smini-visible fw-bold tracking-wide fs-lg">
                c<span class="text-primary">b</span>
              </span>
                            <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                <span class="smini-hidden">
                  <i class="fa fa-fire text-primary"></i>
                  <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                </span>
                            </a>
                        </div>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button class="btn btn-sm btn-alt-danger d-lg-none" data-action="sidebar_close"
                                    data-toggle="layout"
                                    type="button">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Sidebar Scrolling -->
                    <div class="js-sidebar-scroll">
                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <button class="btn btn-primary w-100 push d-flex align-items-center justify-content-between"
                                    type="button">
                                <span>Add Project</span>
                                <i class="fa fa-plus opacity-50 ms-1"></i>
                            </button>
                            <ul class="nav-main">
                                <li class="nav-main-item">
                                    <a class="nav-main-link active" href="db_classic.html">
                                        <i class="nav-main-link-icon fa fa-coffee"></i>
                                        <span class="nav-main-link-name">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-main-heading">Headquarters</li>
                                <li class="nav-main-item">
                                    <a aria-expanded="false" aria-haspopup="true"
                                       class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                                        <i class="nav-main-link-icon fa fa-briefcase"></i>
                                        <span class="nav-main-link-name">Projects</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="">
                                                <span class="nav-main-link-name">New</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="">
                                                <span class="nav-main-link-name">Manage</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>
                                        <span class="nav-main-link-name">Invoices</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon fa fa-users"></i>
                                        <span class="nav-main-link-name">Clients</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon fa fa-wallet"></i>
                                        <span class="nav-main-link-name">Payments</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon fa fa-layer-group"></i>
                                        <span class="nav-main-link-name">Requests</span>
                                    </a>
                                </li>
                                <li class="nav-main-heading">Settings</li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon fa fa-sticky-note"></i>
                                        <span class="nav-main-link-name">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon fa fa-lock"></i>
                                        <span class="nav-main-link-name">Security</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- END Sidebar Scrolling -->
                </div>
                <!-- Sidebar Content -->
            </nav>

            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center space-x-2">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button class="btn btn-sm btn-alt-secondary" data-action="sidebar_toggle" data-toggle="layout"
                                type="button">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button class="btn btn-sm btn-alt-secondary d-sm-none" data-action="header_search_on"
                                data-toggle="layout"
                                type="button">
                            <i class="fa fa-fw fa-search"></i>
                        </button>
                        <!-- END Open Search Section -->

                        <!-- Full Search -->
                        <form action="db_classic.html" class="d-none d-sm-inline-block" method="POST"
                              onsubmit="return false;">
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="Search.." type="text">
                                <span class="input-group-text">
                  <i class="fa fa-search"></i>
                </span>
                            </div>
                        </form>
                        <!-- END Full Search -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="space-x-1">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button id="page-header-user-dropdown" aria-expanded="false" aria-haspopup="true"
                                    class="btn btn-sm btn-alt-secondary" data-bs-toggle="dropdown" type="button">
                                <span class="fw-semibold">Admin</span>
                                <i class="fa fa-angle-down opacity-50 ms-1"></i>
                            </button>
                            <div aria-labelledby="page-header-user-dropdown"
                                 class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0">
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                       href="be_pages_generic_profile.html">
                                        <span>Profile</span>
                                        <i class="fa fa-fw fa-user opacity-25"></i>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                       href="be_pages_generic_inbox.html">
                                        <span>Inbox</span>
                                        <i class="fa fa-fw fa-envelope-open opacity-25"></i>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                       href="be_pages_generic_invoice.html">
                                        <span>Invoices</span>
                                        <i class="fa fa-fw fa-file opacity-25"></i>
                                    </a>
                                    <div class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                       data-action="side_overlay_toggle" data-toggle="layout" href="javascript:void(0)">
                                        <span>Settings</span>
                                        <i class="fa fa-fw fa-wrench opacity-25"></i>
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1"
                                       href="op_auth_signin.html">
                                        <span>Sign Out</span>
                                        <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button class="btn btn-sm btn-alt-secondary" data-action="side_overlay_toggle"
                                data-toggle="layout"
                                type="button">
                            <i class="fa fa-fw fa-list"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <form action="be_pages_generic_search.html" class="w-100" method="POST">
                            <div class="input-group">
                                <!-- Close Search Section -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button class="btn btn-secondary" data-action="header_search_off" data-toggle="layout"
                                        type="button">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                                <!-- END Close Search Section -->
                                <input id="page-header-search-input" class="form-control"
                                       name="page-header-search-input"
                                       placeholder="Search or hit ESC.." type="text">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-fw fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="far fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
        </div>
    </div>

</template>

<style scoped>

</style>
