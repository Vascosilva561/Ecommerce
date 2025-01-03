<div class="top_bar" style="background-color: #952825; color: white;">
    <div class="container">
        <div class="row">
            <div class="top_bar_contact_item">
                <div class="top_bar_icon"><img src="{{ asset('images/phone.png') }}" alt="">
                    <b>+(244) 997 602 038</b>
                </div>
            </div>
            <div class="top_bar_contact_item">
                <div class="top_bar_icon"><img src="{{ asset('images/mail.png') }}" alt=""> <a
                        href="info@okulandisa.net"><b style="color: white">info@okulandisa.net</b></a>
                </div>
            </div>
            <div class="top_bar_content ml-auto">
                <div class="top_bar_user">
                    @guest
                        <div class="user_icon"><img src="{{ asset('images/user.svg') }}" alt="">
                        </div>
                        <div><a href="{{ route('register') }}" style="color: white">Registrar</a></div>
                        <div><a href="{{ route('login') }}" style="color: white">Entrar</a></div>
                    @else
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>

        </div>
    </div>
</div>
