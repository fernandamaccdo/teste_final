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

        .comentarios {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .comentarios img {
            width: 18px;
            height: 18px;
        }

        .btn-arrow {
            background: none;
            border: none;
            cursor: pointer;
            padding: 2px;
        }

        .btn-arrow img {
            width: 18px;
            height: 18px;
            filter: brightness(0);
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
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            margin-left: 180px;
        }

        .rodape-direita {
            font-size: 16px;
            margin-right: 180px;
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
            margin-top: -600px;
        }
    </style>
</head>
<body>

    <div class="container-linhas">
        <div class="bloco-esquerda" style="text-align:center">
            <img class="foto-principal" src="{{ asset(Auth::user()->foto) }}" alt="">
            <div>{{ Auth::user()->name }}</div>
            <div style="margin-top:14px;">Quantidade Likes: 2<br>Quantidade Deslikes: 1</div>
        </div>

        <div class="bloco-centro">
            <h1 style="text-align:center">Publicações</h1>

            <div class="publicacao">
                <div><strong>Título do prato 01</strong></div>
                <img src="{{ asset('publicacao01.png')}}" alt="Prato 01">

                <div class="info-linha">
                    <div class="votos">
                        <span class="local">Local 01</span>
                        <button class="btn-arrow"><img src="{{ asset('flecha_cima_vazia.svg')}}"></button>2
                        <button class="btn-arrow"><img src="{{ asset('flecha_baixo_vazia.svg')}}"></button>1
                    </div>
                    <div class="comentarios">
                        <span class="cidade">Maceió-AL</span>
                        <img src="{{ asset('chat.svg') }}" alt="Comentários">
                        <span>4</span>
                    </div>
                </div>

                <div class="campo-comentario">
                    <input type="text" placeholder="Escreva um comentário..." id="textoComentario">
                    <input type="number" id="notaComentario" placeholder="Nota" min="0" max="10">
                    <button class="btn-comentar" id="btnComentar">Comentar</button>
                </div>

                <div class="lista-comentarios" id="listaComentarios">
                    <div class="comentario">
                        <div><strong>usuario_03:</strong> Super recomendo! <span class="nota">(Nota: 10)</span></div>
                        <div class="botoes-comentario">
                            <img src="{{ asset('lapis_editar.svg') }}" class="editar" alt="Editar">
                            <img src="{{ asset('lixeira_deletar.svg') }}" class="deletar" alt="Excluir">
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <div class="rodape-direita">Copyright - 2024</div>
    </div>

    <script>

        //comentario
        const lista = document.getElementById('listaComentarios');

        document.getElementById('btnComentar').addEventListener('click', function() {
            const texto = document.getElementById('textoComentario').value.trim();
            const nota = document.getElementById('notaComentario').value.trim();

            if (texto !== '' && nota !== '') {
                const comentario = document.createElement('div');
                comentario.classList.add('comentario');
                comentario.innerHTML = `
                    <div><strong>{{ Auth::user()->name }}:</strong> ${texto} <span class="nota">(Nota: ${nota})</span></div>
                    <div class="botoes-comentario">
                        <img src="{{ asset('lapis_editar.svg') }}" class="editar" alt="Editar">
                        <img src="{{ asset('lixeira_deletar.svg') }}" class="deletar" alt="Excluir">
                    </div>
                `;
                lista.appendChild(comentario);

                document.getElementById('textoComentario').value = '';
                document.getElementById('notaComentario').value = '';
            } else {
                alert('Por favor, escreva o comentário e adicione uma nota.');
            }
        });

        // editar e excluir
        lista.addEventListener('click', function(e) {
            const item = e.target;
            if (item.classList.contains('deletar')) {
                item.closest('.comentario').remove();
            }

            if (item.classList.contains('editar')) {
                const comentarioDiv = item.closest('.comentario').querySelector('div:first-child');
                const textoOriginal = comentarioDiv.textContent;
                const novoTexto = prompt('Edite seu comentário:', textoOriginal);
                if (novoTexto !== null && novoTexto.trim() !== '') {
                    comentarioDiv.innerHTML = novoTexto;
                }
            }
        });
    </script>

</body>
</html>


