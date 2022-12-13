<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <div id="mobile-menu">
                <div class="left-nav-toggle">
                    <a href="#">
                        <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
            </div>
            <a class="navbar-brand" href="{!! url('/') !!}">
                Lotus
                <span>Travels</span>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="left-nav-toggle">
                <a href="">
                    <i class="stroke-hamburgermenu"></i>
                </a>
            </div>
            <form class="navbar-form navbar-left">
                <input type="text" class="form-control" placeholder="Search" style="width: 175px">
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class=" profil-link">
                    <a href="{!! url('/system/employee/'. Auth::id()) !!}">
                        <span class="profile-address" style="margin-top: 10px">{!! strtoupper(Auth::user()->name) !!}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>