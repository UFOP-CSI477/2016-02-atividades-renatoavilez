<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
            </button>

            <a class="navbar-brand" href="/">Sistema de Controle de Solicitações de Análises Laboratoriais</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">   
                @if(Auth::check())   
                {{-- Confere se um paciente esta logado  --}}
                    <li class=""><a href="">Paciente</a></li>
                    <li class=""><a href="{{ route('exames.index')}}">Exames</a></li>

                    <li class="dropdown">                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Olá {{ Auth::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{-- <li role="separator" class="divider"></li> --}}
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>             
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">{{ csrf_field() }}</form></li>
                        </ul>
                    </li>
                
                @elseif(Auth::guard("admin_user")->user())
                    {{-- <li class="">admin_ser</li> --}}
                    <li class=""><a href="{{ route('procedimentos.index')}}">Procedimentos</a></li>
                    <li class=""><a href="{{ route('exames.index')}}">Exames</a></li>
                    <li class="dropdown">                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Olá {{ Auth::guard("admin_user")->user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{-- <li role="separator" class="divider"></li> --}}
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>             
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">{{ csrf_field() }}</form></li>
                        </ul>
                        <li>
                            <a href="{{ url('/admin_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/admin_logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </li>

                @else
                    {{-- <li class="">ngm logoado</li> --}}
                    <li class=""><a href="{{ route('procedimentos.index')}}">Procedimentos</a></li>

                    <li class="dropdown">                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Paciente <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class=""><a href="{{ route('login')}}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Cadastro</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Administrador <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class=""><a href="{{ route('admin_login.login')}}">Administrador</a></li>
                            <li class=""><a href="{{ url('admin_register') }}">Cadastro</a></li>
                        </ul>
                    </li>

                    <li class=""><a href="{{ route('admin_login.login')}}">Administrador</a></li>
                @endif

            </ul>
   
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>