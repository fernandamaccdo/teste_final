<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sabor do Brasil</title>
    <style>
        body {
            background: #fafafa;
            font-family: Arial, sans-serif;
        }

        .container-linhas {
            display: flex;
            max-width: 1100px;
            margin: 30px auto 0 auto;
            gap: 16px;
        }

        .bloco-esquerda,
        .bloco-direita {
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
            margin-bottom: 16px;
            padding: 12px;
            background: #fcfcfc;
            border: 1px solid #ddd;
        }

        .publicacao img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            margin-bottom: 6px;
        }
        .rodape {
            background: #ff6600;
            color: #fff;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px 0;
            display: flex;
            justify-content: space-between; 
            align-items: center;
            text-align: center; 
            padding-left: 40px;
            padding-right: 40px;
        }
        .rodape-centro {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
        }
        .rodape-centro img {
         width: 20px;
         height: 20px;
        }
        .rodape-esquerda {
            font-size: 14px;
            margin-left:180px;
        }
        .rodape-direita{
            font-size: 16px;
            margin-right:180px;
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
            gap: 8px;
        }

        .local {
            font-weight: bold;
            margin-right: 8px;
        }

        .cidade {
            font-size: 13px;
            color: black;
            margin-right: 8px;
        }

        .comentarios {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .comentarios img {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .btn-arrow {
            background: none;
            border: none;
            cursor: pointer;
            padding: 2px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-arrow img {
            width: 18px;
            height: 18px;
            filter: brightness(0);
            transition: transform 0.2s;
        }

        .btn-arrow:hover img {
            transform: scale(1.2);
        }

        .btn-arrow.active img {
            filter: brightness(0) saturate(100%) invert(15%) sepia(92%)
                    saturate(7490%) hue-rotate(358deg) brightness(100%) contrast(102%);
        }

        .rodape {
            background: #ff6600;
            color: #fff;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 40px;
            padding-right: 40px;
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
            margin-top: -1200px;
        }
    </style>
</head>
<body>
    <div class="container-linhas">
        <!-- BLOCO ESQUERDO: USUÁRIO -->
        <div class="bloco-esquerda" style="text-align:center">
            <img class="foto-principal" src="{{ asset($user->foto) }}" alt="Foto do usuário">
            <div>{{ $user->name }}</div>
            <div style="margin-top:14px;">
                Likes: {{ $user->total_likes ?? 0 }}<br>
                Dislikes: {{ $user->total_deslikes ?? 0 }}
            </div>
        </div>

        <!-- BLOCO CENTRAL: PUBLICAÇÕES -->
        <div class="bloco-centro">
            <h1 style="text-align:center">Minhas Publicações</h1>

            @forelse ($publicacoes as $pub)
                <div class="publicacao">
                    <div><strong>{{ $pub->titulo_prato ?? 'Sem título' }}</strong></div>

                    @if ($pub->foto)
                        <img src="{{ asset($pub->foto) }}" alt="Imagem da publicação">
                    @endif

                    <div class="info-linha">
                        <div class="votos">
                            <span class="local">{{ $pub->local_ ?? '' }}</span>

                            <form action="{{ route('like') }}" method="post" style="display:inline;">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
                                <button class="btn-arrow" type="submit" title="Curtir">
                                    <img src="{{ asset('flecha_cima_vazia.svg') }}" alt="curtir">
                                </button>
                                <span>{{ $pub->like_count ?? 0 }}</span>
                            </form>

                            <form action="{{ route('deslike') }}" method="post" style="display:inline; margin-left:6px;">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
                                <button class="btn-arrow" type="submit" title="Não curtir">
                                    <img src="{{ asset('flecha_baixo_vazia.svg') }}" alt="não curtir">
                                </button>
                                <span>{{ $pub->deslike_count ?? 0 }}</span>
                            </form>
                        </div>

                        <div class="comentarios">
                            <span class="cidade">{{ $pub->cidade ?? '' }}</span>
                            <a href="{{ route('publicacao.show', ['id' => $pub->id]) }}">
                                <img src="{{ asset('chat.svg') }}" alt="chat">
                            </a>
                            <span>{{ $pub->comentarios_count ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p style="text-align:center;">Nenhuma publicação encontrada.</p>
            @endforelse
        </div>

        <!-- BLOCO DIREITO: SAIR -->
        <div class="bloco-direita" style="display:flex; align-items:center; justify-content:center;">
            <div id="sair">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-laranja">Sair</button>
                </form>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="rodape-esquerda">Sabor do Brasil</div>
        <div class="rodape-centro">
            <img src="{{ asset('Instagram.svg') }}" alt="Instagram">
            <img src="{{ asset('Twitter.svg') }}" alt="Twitter">
            <img src="{{ asset('Whatsapp.svg') }}" alt="Whatsapp">
            <img src="{{ asset('Globe.svg') }}" alt="Globe">
        </div>
        <div class="rodape-direita">Copyright-2024</div>
    </div>

    <script>
        document.querySelectorAll('.btn-arrow').forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
