<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>

        <div class="mg-t-15 mg-r-10">
            <a href="#"><img src="{{asset('assets/admin/download.svg')}}" width="50"></a>
        </div>


    </div><!-- br-header-left -->
    <div class="br-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down">
                        {{\Auth::user()->name}}

                    </span>
                    <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" alt="">
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-250">

                    <hr>

                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="{{route('admin.logout')}}"><i class="icon ion-power"></i>Logout</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
    </div><!-- br-header-right -->
</div><!-- br-header -->
