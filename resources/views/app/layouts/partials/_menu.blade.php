<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="fa big-icon fa-home"></i>
        <span class="mini-dn">Dashboard</span>
        <span class="indicator-right-menu mini-dn">
            <i class="fa indicator-mn fa-angle-left"></i>
        </span>
    </a>
</li>

@if(Auth::user()->role == "st2or")
    <li class="nav-item">
        <a href="{{ route('administrators') }}" class="dropdown-item">
            <i class="fa big-icon fa-users"></i>
            <span class="mini-dn">Administrateurs</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('masters') }}" class="dropdown-item">
            <i class="fa big-icon fa-users"></i>
            <span class="mini-dn">Masters</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>

@elseif(Auth::user()->role == "admin")
    <li class="nav-item">
        <a href="{{ route('masters') }}" class="dropdown-item">
            <i class="fa big-icon fa-users"></i>
            <span class="mini-dn">Masters</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('donateurs') }}" class="dropdown-item">
            <i class="fa big-icon fa-users"></i>
            <span class="mini-dn">Donateurs</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>

@elseif(Auth::user()->role == "master")
    <li class="nav-item">
        <a href="{{ route('parrains') }}" class="nav-link dropdown-toggle">
            <i class="fa big-icon fa-users"></i>
            <span class="mini-dn">Espace parrain</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
@endif

@if(Auth::user()->role == "st2or" || Auth::user()->role == "admin")
<li class="nav-item">
    <a href="{{ route('adhesions') }}" class="nav-link">
        <i class="fa big-icon fa-square"></i>
        <span class="mini-dn">Adhésions</span>
        <span class="indicator-right-menu mini-dn">
            <i class="fa indicator-mn fa-angle-left"></i>
        </span>
    </a>
</li>
@endif

@if(Auth::user()->role == "st2or")
    <li class="nav-item">
        <a href="{{ route('packs') }}" class="nav-link">
            <i class="fa big-icon fa-rss"></i>
            <span class="mini-dn">Gestion des packs</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
@endif


@if(Auth::user()->role == "suse" || Auth::user()->role == "master")

    <li class="nav-item">
        <a href="{{ route('dons') }}" class="nav-link">
            <i class="fa big-icon fa-exchange"></i>
            <span class="mini-dn">Gestion des dons</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
     <li class="nav-item">
        <a href="{{ route('rsds') }}" class="nav-link">
            <i class="fa big-icon fa-exchange"></i>
            <span class="mini-dn">Gestion des RSD</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
@endif
@if(Auth::user()->role == "st2or")
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fa big-icon fa-wrench"></i>
            <span class="mini-dn">Mise en maintenance</span>
            <span class="indicator-right-menu mini-dn">
                <i class="fa indicator-mn fa-angle-left"></i>
            </span>
        </a>
    </li>
@endif
