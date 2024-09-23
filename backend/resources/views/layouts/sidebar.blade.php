<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          @can('user.index')
            <li>
              <a href="{{route('user.index')}}">
                            <span>Usuarios</span>
              </a>
            </li>
          @endcan
            <li>
              <a href="{{route('bar.index')}}">
                            <span>Bares</span>
              </a>
            </li>
            <li>
              <a href="{{route('trago.index')}}">
                            <span>Tragos</span>
              </a>
            </li>
            <li>
              <a href="{{route('tutorial.index')}}">
                            <span>Tutoriales</span>
              </a>
            </li>
            <li>
              <a href="{{route('etiqueta.index')}}">
                            <span>Etiquetas</span>
              </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
</aside>