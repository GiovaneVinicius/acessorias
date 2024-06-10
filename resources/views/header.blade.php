<header class="head">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="{{url('/produtos')}}">Produtos</a>
                </li>
                <li>
                    <a href="{{url('/pedidos')}}">Pedidos</a>
                </li>
                <li>
                    <a href="{{url('/carrinho')}}">Carrinho</a>
                </li>
            </ul>
            <div class="social">
                <span>Olá, {{ auth()->user()->name }}</span>
                <a href="#" id="sair">Sair</a>
            </div>
        </nav>
    </div>
</header>