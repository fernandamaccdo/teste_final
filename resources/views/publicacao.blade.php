<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sabor do Brasil - Avaliações</title>
    <style>
        body {
            background: #fafafa;
            font-family: Arial, sans-serif;
            margin-bottom: 70px;
        }

        .container-linhas {
            display: flex;
            max-width: 1100px;
            margin: 30px auto 0 auto;
            gap: 16px;
        }

        .bloco-esquerda, .bloco-direita {
            flex: 1 1 200px;
            background: #fff;
            min-height: 330px;
            padding: 16px;
        }

        .bloco-centro {
            flex: 3 1 480px;
            background: #fff;
            padding: 16px;
            min-height: 330px;
        }

        .foto-principal {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .publicacao {
            padding: 10px;
            background: #fcfcfc;
            border: 1px solid #ddd;
        }

        .publicacao img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            margin-bottom: 6px;
        }

        .info-linha {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-top: 4px;
        }

        .votos {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .local {
            font-weight: bold;
        }

        .cidade {
            font-size: 13px;
            color: black;
        }

        .campo-comentario {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
        }

        .campo-comentario input[type="text"] {
            flex: 1;
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .campo-comentario input[type="number"] {
            width: 60px;
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-comentar {
            background: orange;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .lista-comentarios {
            margin-top: 16px;
        }

        .comentario {
            background: #f7f7f7;
            padding: 8px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comentario strong {
            color: #ff6600;
        }

        .nota {
            color: #333;
            font-weight: bold;
            margin-left: 4px;
        }

        .botoes-comentario {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .botoes-comentario img {
            width: 18px;
            height: 18px;
            cursor: pointer;
            transition: 0.2s;
        }

        .botoes-comentario img:hover {
            transform: scale(1.1);
        }

        
        .rodape {
            background: #ff6600;
            color: #fff;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 12px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .bloco-esquerda,
        .bloco-direita {
            flex: 1 1 200px;
            background: #fff;
            min-height: 330px;
            padding: 16px;
        }
        .rodape-icones {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .rodape-icones img {
            width: 22px;
            height: 22px;
            filter: brightness(0) invert(1);
            transition: transform 0.2s;
        }

        .rodape-icones img:hover {
            transform: scale(1.1);
        }

        .btn-laranja {
            background: orange;
            color: #fff;
            border: none;
            padding: 10px 28px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        #sair {
            margin-top: -400px;
        }
    </style>
</head>
<body>

    <div class="container-linhas">
        <!-- BLOCO ESQUERDO -->
        <div class="bloco-esquerda" style="text-align:center">
            <img class="foto-principal" src="{{ asset(Auth::user()->foto) }}" alt="">
            <div>{{ Auth::user()->name }}</div>
        </div>

        <!-- BLOCO CENTRAL -->
        <div class="bloco-centro">
            <h1 style="text-align:center">{{ $publicacao->titulo_prato }}</h1>

            <div class="publicacao">
                @if ($publicacao->foto)
                    <img src="{{ asset($publicacao->foto) }}" alt="Imagem do prato">
                @endif

                <div class="info-linha">
                    <div class="votos">
                        <span class="local">{{ $publicacao->local_ }}</span>
                    </div>
                    <div class="comentarios">
                        <span class="cidade">{{ $publicacao->cidade }}</span>
                    </div>
                </div>

                <!-- FORMULÁRIO PARA COMENTAR -->
                <form action="{{ route('avaliacao.store') }}" method="POST" class="campo-comentario">
                    @csrf
                    <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                    <input type="text" name="comentario" placeholder="Escreva um comentário..." required>
                    <input type="number" name="nota" placeholder="Nota" min="0" max="10" required>
                    <button type="submit" class="btn-comentar">Comentar</button>
                </form>

                <!-- LISTA DE AVALIAÇÕES -->
                <div class="lista-comentarios">
                    @forelse ($publicacao->avaliacoes as $avaliacao)
                        <div class="comentario">
                            <div>
                                <strong>{{ $avaliacao->usuario->name ?? 'Usuário' }}:</strong>
                                {{ $avaliacao->comentario }}
                                <span class="nota">(Nota: {{ $avaliacao->nota }})</span>
                            </div>
                            @if ($avaliacao->usuario_id == Auth::id())
                                <div class="botoes-comentario">
                                    <form action="{{ route('avaliacao.destroy', $avaliacao->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este comentário?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:none;border:none;">
                                            <img src="{{ asset('lixeira_deletar.svg') }}" alt="Excluir">
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p style="text-align:center;">Nenhuma avaliação ainda. Seja o primeiro a comentar!</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- BLOCO DIREITO -->
        <div class="bloco-direita" style="display:flex; align-items:center; justify-content:center;">
            <div id="sair">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-laranja" id="sair">Sair</button>
                </form>
            </div>
        </div>
    </div>

    <!-- RODAPÉ -->
    <footer class="rodape">
        <div class="rodape-esquerda">
            <span>Sabor do Brasil</span>
        </div>

        <div class="rodape-icones">
            <a href="#" title="Instagram"><img src="{{ asset('instagram.svg') }}" alt="Instagram"></a>
            <a href="#" title="Twitter"><img src="{{ asset('twitter.svg') }}" alt="Twitter"></a>
            <a href="#" title="WhatsApp"><img src="{{ asset('whatsapp.svg') }}" alt="WhatsApp"></a>
            <a href="#" title="Site Oficial"><img src="{{ asset('globo.svg') }}" alt="Site"></a>
        </div>

        <div class="rodape-direita">
            <span>Copyright - 2024</span>
        </div>
    </footer>

</body>
</html>
