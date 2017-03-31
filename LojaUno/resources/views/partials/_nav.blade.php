<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
            </button>

            <a class="navbar-brand" href="/">Óticas Duos</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <ul class="nav navbar-nav navbar-right">   
                @if(Auth::check())   
                {{-- Confere se um usuario esta logado  --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> E aí {{ Auth::user()->name}} <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
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

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @if(Auth::user()->type == 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Area<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('categoriaPreco.index')}}">Categoria Preco</a></li>
                                <li><a href="{{route('categoriaProduto.index')}}">Categoria Produto</a></li>
                                <li><a href="{{route('produto.index')}}">Produtos</a></li>
                            </ul>
                    </li>

                    @endif
                @endif
                    <li><a href="{{route('carrinho.index')}}">Carrinho</a></li>                  
                    
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('linhas')}}">Linhas</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('categorias')}}">Categorias</a></li>
            </ul>

            
   
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>