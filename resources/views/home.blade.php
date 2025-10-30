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
        .logo-principal {
            width: 80px;
            display: block;
            margin: 0 auto 12px auto;
        }
        .publicacao {
            margin-bottom: 14px;
            padding: 12px;
            background: #fcfcfc;
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
        .btn-laranja {
            background: orange;
            color: #fff;
            border: none;
            margin-top:-1200px;
            padding: 10px 28px;
            font-size: 16px;
            border-radius: 4px;
        }
        
        .modal-simples {
            display: none; 
            position: fixed; 
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.40);
            justify-content: center;
            align-items: center;
        }
        .modal-conteudo {
            background: #fff;
            padding: 30px 22px;
            border-radius: 6px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.2);
            min-width: 300px;
        }
        .modal-conteudo h3 { margin-top: 0;}
        .input-simples {
            width: 100%;
            margin-bottom: 14px;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 15px;
        }
        .btn-modal-fechar {
            background: transparent;
            color: #ff6600;
            border: none;
            font-size: 18px;
            float: right;
            cursor: pointer;
        }
        
        .btn-arrow {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            vertical-align: middle;
        }
        .btn-arrow img {
            width: 20px;
            height: 20px;
            transition: filter 0.3s;
            filter: brightness(0); 
        }
       


        .btn- img {
            width: 20px;
            height: 20px;
            transition: filter 0.3s;
            filter: brightness(0); /* Preto */
        }


    </style>
</head>
<body>
    <div class="container-linhas">
        <div class="bloco-esquerda" style="text-align:center">
            <img class="logo-principal" src="{{ asset('imagens/logo_sabor_do_brasil.png')}}" alt="">
            <div>Sabor do Brasil</div>
            <div style="margin-top:14px;">Likes: 9<br>Dislikes: 12</div>
        </div>
        <div class="bloco-centro">
            <h1 style="text-align:center">Publicações </h1>
            <div class="publicacao">
                <div><strong>Título do prato 01</strong></div>
                <img src="{{ asset('publicacao01.png')}}" alt="Prato 01">
                <div>Local 01</div>
                <div>
                  <button class="btn-arrow" aria-label="Curtir">
                    <img src="{{ asset('flecha_cima_vazia.svg')}}" alt="Seta para cima">
                  </button>
                  <button class="btn-arrow" aria-label="Não curtir">
                    <img src="{{ asset('flecha_baixo_vazia.svg')}}" alt="Seta para baixo">
                  </button>
                  | Maceió-AL | 💬 4
                </div>
            </div>
            <div class="publicacao">
                <div><strong>Título do prato 02</strong></div>
                <img src="{{ asset('publicacao02.png')}}" alt="Prato 02">
                <div>Local 02</div>
                <div>
                  <button class="btn-arrow" aria-label="Curtir">
                    <img src="{{ asset('flecha_cima_vazia.svg')}}" alt="Seta para cima">
                  </button>
                  <button class="btn-arrow" aria-label="Não curtir">
                    <img src="{{ asset('flecha_baixo_vazia.svg')}}" alt="Seta para baixo">
                  </button>
                  | Maceió-AL | 💬 10
                </div>
            </div>
            <div class="publicacao">
                <div><strong>Título do prato 03</strong></div>
                <img src="{{ asset('publicacao03.png')}}" alt="Prato 03">
                <div>Local 03</div>
                <div>
                  <button class="btn-arrow" aria-label="Curtir">
                    <img src="{{ asset('flecha_cima_vazia.svg')}}" alt="Seta para cima">
                  </button>
                  <button class="btn-arrow" aria-label="Não curtir">
                    <img src="{{ asset('flecha_baixo_vazia.svg')}}" alt="Seta para baixo">
                  </button>
                  | Maceió-AL | 💬 2
                </div>
            </div>
        </div>
        <div class="bloco-direita" style="display:flex; align-items:center; justify-content:center;">
            <button class="btn-laranja" onclick="document.getElementById('modalLogin').style.display='flex'">Entrar</button>
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

    <!-- Modal -->
    <div class="modal-simples" id="modalLogin">
        <div class="modal-conteudo">
            <button class="btn-modal-fechar" onclick="document.getElementById('modalLogin').style.display='none'">&times;</button>
            <h3>Login</h3>
            <form action= "{{ route('login') }}" method="post">
                @csrf
                <input type="email" class="input-simples" placeholder="Seu Email" name="email" id="email">
                <input type="password" class="input-simples" placeholder="Sua Senha" name="password" id="password">
                <button type="submit" class="btn-laranja" style="width:100%;">Entrar</button>
            </form>
        </div>
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