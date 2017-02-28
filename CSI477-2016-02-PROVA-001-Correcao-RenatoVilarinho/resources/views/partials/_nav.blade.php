<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
            </button>

            <a class="navbar-brand" href="/">Sistema de Controle de Registros em Eventos Esportivos</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
             <ul class="nav navbar-nav">
                <li class="{{ Request::is('evento') ? "active" : "" }}"><a href="eventos.index">Eventos</a></li>
           </ul>


            <ul class="nav navbar-nav navbar-right">   
                @if(Auth::check())   
                {{-- Confere se um usuario esta logado  --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> E aí {{ Auth::user()->name}} <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route ('registros.index')}}">Registros</a></li>
                            {{-- <li><a href="{{ route ('produtos.index') }}">Produtos</a></li>
                            <li><a href="{{ route ('categoriaProdutos.index')}}">Categorias de Produtos</a></li>
                            <li><a href="{{ route ('categoriaPrecos.index')}}">Categorias de Preços</a></li> --}}
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>             
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                @else
                   
                    <li class=""><a href="{{ route('login')}}">Login</a></li>
                    <li class=""><a href="{{ route('register')}}">Cadastre-se</a></li>
                @endif

            </ul>
   
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>