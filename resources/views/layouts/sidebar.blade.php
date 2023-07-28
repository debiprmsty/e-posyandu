<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>

                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{Request::is('home')? 'active':''}}">
                    <a href='/' class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Halaman Utama</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('dusun')? 'active':''}}">
                    <a href='/dusun'>
                        <i class="fas fa-map-pin"></i>
                        <p>Data Dusun</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('orangtua')? 'active':''}}">
                    <a href='/orangtua'>
                        <i class="fas fa-user-friends"></i>
                        <p>Data Orang Tua</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('balita')? 'active':''}}">
                    <a href='/balita'>
                        <i class="fas fa-child"></i>
                        <p>Data Balita</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('penimbangan')? 'active':''}}">
                    <a href='/penimbangan'>
                        <i class="fas fa-balance-scale"></i>
                        <p>Data Penimbangan Balita</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>