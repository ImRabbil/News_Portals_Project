<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('dashboard') }}"><img
                src="{{ asset('backend') }}/assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('backend') }}/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('backend') }}/assets/images/faces/face15.jpg"
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal"> {{ Auth::user()->name }}
                        </h5>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category') }}">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.subcategory') }}">Sub-Category</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link collapsed" data-toggle="collapse" href="#district" aria-expanded="false"
                aria-controls="district">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Districts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="district" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district') }}"> District </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.subdistrict') }}"> Sub-Districts
                        </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link collapsed" data-toggle="collapse" href="#post" aria-expanded="false"
                aria-controls="post">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.add.post') }}"> Add Post </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.post') }}">All Post
                        </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link collapsed" data-toggle="collapse" href="#social" aria-expanded="false"
                aria-controls="social">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="social" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.update.social') }}">
                            Socials-Setting </a></li>


                </ul>
            </div>

            <div class="collapse" id="social" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('admin.update.prayer') }}">Prayer-Setting </a></li>


                </ul>
            </div>

            <div class="collapse" id="social" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.update.seo') }}">SEO-Setting
                        </a></li>


                </ul>
            </div>
            <div class="collapse" id="social" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.live.tv') }}">Live-TvSetting
                        </a></li>


                </ul>
            </div>

            <div class="collapse" id="social" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.notice') }}">Notice-Setting </a>
                    </li>

                </ul>
            </div>


        </li>

        <li class="nav-item menu-items">
            <a class="nav-link collapsed" data-toggle="collapse" href="#website" aria-expanded="false"
                aria-controls="website">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Website</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="website" style="">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.add.website') }}"> Add Website </a></li> --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.website') }}">All Website
                        </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link collapsed" data-toggle="collapse" href="#gallery" aria-expanded="false"
                aria-controls="gallery">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Gallery</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gallery" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.add.videos') }}">
                            VideosGallery</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.photo') }}"> PhotoGallery
                        </a></li>

                </ul>
            </div>
        </li>



        <li class="nav-item menu-items">
            <a class="nav-link collapsed" data-toggle="collapse" href="#ads" aria-expanded="false"
                aria-controls="ads">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Advertisment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ads" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.ads') }}"> Ads List</a>
                    </li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('admin.all.photo') }}"> Ads Add
                        </a></li> --}}

                </ul>
            </div>
        </li>
    </ul>
</nav>
