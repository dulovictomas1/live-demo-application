<header class="header-public">
    <div class="header-inner">
        <div class="logo"></div>

        <button class="menu-toggle" aria-label="Otvoriť menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav">
            <ul class="nav-menu-primary">
                <li><a href="{{ route('home') }}">Domov</a></li>
                    @foreach(\App\Models\Service::all() as $service)
                        <li>
                            <a href="{{ route('service.page', $service->slug) }}">
                                {{ $service->name }}
                            </a>
                        </li>    
                    @endforeach
                                
                <li><a href="{{ route('kontakt') }}">Kontakt</a></li>

                @if (Route::has('login'))                
                    @auth
                            <li class="btn_menu"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li class="btn_menu"><a href="{{ route('login') }}">Log in</a></li>

                        @if (Route::has('register'))
                            <li class="btn_menu"><a href="{{ route('register') }}">Register</a></li>
                    @endif
                    @endauth                
                @endif
            </ul>
        </nav>
        
    </div>



        

        


</header>