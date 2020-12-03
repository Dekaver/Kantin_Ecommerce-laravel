<nav id="sidebar">
    <div class="sidebar-header">
        <img src="img/Logo-Web-ITK.png" alt="itk" id="itk">
        
    </div>
    <ul class="list-unstyled components">
        <h3>E-KANTIN</h3>
        <p>MENU</p>
        
        <li class="nav-item{{request()->is('/')?" active":""}}">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li>
            <a href="#Data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Data
            </a>
            <ul class="collapse list-unstyled" id="Data">
                <li class="nav-item{{request()->is('history')?" active":""}}">
                    <a class="nav-link" href="/history">History</a>
                </li>
                <li class="nav-item{{request()->is('cart')?" active":""}}">
                    <a class="nav-link" href="/cart">Cart</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#View" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Sort By
            </a>
            <ul class="collapse list-unstyled" id="View">
                <li class="nav-item{{request()->is('history')?" active":""}}">
                    <a class="nav-link" href="/history">Recomended</a>
                </li>
                <li class="nav-item{{request()->is('cart')?" active":""}}">
                    <a class="nav-link" href="/cart">Penjual</a>
                </li>
                <li class="nav-item{{request()->is('favorite')?" active":""}}">
                    <a class="nav-link" href="/cart">Favorite</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#Proses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">proses</a>
            <ul class="collapse list-unstyled" id="Proses">
                <li class="nav-item{{request()->is('payment')?" active":""}}">
                    <a class="nav-link" href="/payment">Pembayaran</a>
                </li>
            </ul>
        </li>	
        <li class="nav-item{{request()->is('about')?" active":""}}">
            <a href="/about">About</a>
        </li>
        <li class="nav-item{{request()->is('contact')?" active":""}}">
            <a href="/contact">Contact</a>
        {{-- </li>
        <li class="nav-item badge badge-danger ml-lg-2">
            @guest
            @else
                <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </li> --}}
    </ul>   
</nav>
