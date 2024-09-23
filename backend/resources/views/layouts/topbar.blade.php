
<header class="header dark-bg">
      
      <!--logo start-->
      <a href="{{route('home')}}" class="logo">Cocktail <span class="lite">Maps</span></a>
      <!--logo end-->

      <div class="top-nav">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <span class="username">Menu</span>
                        </a>
            <ul class="dropdown-menu extended logout">
                    @auth

                    <form method="POST" action="{{ route('logout') }} "> 
                    @csrf
                    <li><a style="color: #fff; background-color: #688a7e !important" href="cerrarSesion" onclick="event.preventDefault();this.closest('form').submit();">
                        Cerrar Sesión
                    </a></li>
                    </form>

                    @else
                    <li class=""><a href="{{ route('login') }}" >
                        Iniciar sesión
                    </a></li>

                    @endauth

            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->
