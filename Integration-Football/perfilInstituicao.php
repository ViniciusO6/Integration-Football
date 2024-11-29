<?php 
  $imports =[

    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  ];
  $titulo = 'Perfil da Instituição';
  $pageCSS = ["perfilInstituicao.css"];
  $pageJS = ["perfilInstituicao.js"];
  include_once('./templetes/headerInstituicao.php');
 
  include_once('config.php'); // Incluindo o arquivo de conexão com o banco
  
  // Verifica se o ID da instituição está armazenado na sessão
  if (!isset($_SESSION['id'])) {
      echo "Você precisa estar logado para acessar esta página.";
      exit;
  }

  // Recupera o ID da instituição a partir da sessão
  $id_instituicao = $_SESSION['id'];

  // Consulta SQL para pegar as informações da tabela instituicao
  $sql = "SELECT id, cnpj_instituicao, telefone_instituicao, nome_instituicao, email_instituicao, senha FROM instituicao WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id_instituicao); // Bind do parâmetro do tipo inteiro
  $stmt->execute();
  $result = $stmt->get_result();

  // Verificando se a consulta retornou algum resultado
  if ($result->num_rows > 0) {
      // Pega os dados da instituição
      $instituicao = $result->fetch_assoc();
  } else {
      // Se não encontrar nenhum resultado
      echo "Instituição não encontrada!";
      exit;
  }

?>

<div class="container">
<h1 id="titulo">VISUALIZAR PERFIL</h1>
  <div id="perfil">
    <form id="form" action="">
        
        <div id="informacoes"> 
            <div id="bloco1">
                <label for="input-id">ID</label>
                <input id="input-id" type="text" name="id" value="<?= $instituicao['id'] ?>" disabled>

                <label for="input-nome">Nome</label>
                <input id="input-nome" type="text" name="nome" value="<?= $instituicao['nome_instituicao'] ?>" disabled>

                <label for="input-cnpj">CNPJ</label>
                <input id="input-cnpj" type="text" name="cnpj" value="<?= $instituicao['cnpj_instituicao'] ?>" disabled>
            </div>

            <label for="input-email">E-mail</label>
            <input disabled id="input-email" type="text" value="<?= $instituicao['email_instituicao'] ?>">

            <label for="input-senha">Senha</label>
            <input disabled id="senha" type="password" value="<?= $instituicao['senha'] ?>">

            <button onclick="fecharTela()" id="btn-enviar" type="button">Alterar Senha</button>
        </div>

        <div id="bloco2">
            <div id="foto-perfil">
                <button type="button" onclick="file()" id="btn-editar-foto"> 
                    <img src="./Imagens/editar.png" alt=""> 
                </button>
                <input id="input-file" style="display: none;" type="file" name="foto">
            </div>
        </div>
    </form>   
  </div>

  <br><br><br><br><br>

  <!-- Formulário para redefinir a senha -->
  <div class="invisivel" id="redefinir-senha">
    <form onsubmit="return validarCampos()" action="./controller/instituicaocontroller.php" method="post">
      <h1>Redefinir Senha</h1>
      <img id="icon-olho-1" src="./Imagens/icones/visibility_off.svg" alt="">
      <img id="icon-olho-2" src="./Imagens/icones/visibility_off.svg" alt="">
      <img id="icon-olho-3" src="./Imagens/icones/visibility_off.svg" alt="">

      <label for="input-senha">Digite sua senha atual</label>
      <input name="input-senha" id="input-senha" type="password" value="" required autocomplete="off">
      <p class="invisivel" id="erroSenhaAtual">Senha incorreta, tente novamente.</p>

      <label for="input-nova-senha">Digite sua nova senha</label>
      <input name="input-nova-senha" id="input-nova-senha" type="password" value="" required autocomplete="off">

      <label for="input-confirme-senha">Confirme sua nova senha</label>
      <input name="senha" id="input-confirme-senha" type="password" value="" required autocomplete="off">
      <p class="invisivel" id="erroSenha">As senhas digitadas não são iguais. Verifique e tente novamente.</p>

      <div id="btns-redefinir">
        <input type="hidden" name="crud" value="alterarSenha">
        <input name="id" type="hidden" value="<?= $instituicao['id'] ?>">
        <input id="senha-atual" name="senha-atual" type="hidden" value="<?= $instituicao['senha'] ?>">

        <button onclick="fecharTela()" id="btn-confirmar" type="button">Cancelar</button>
        <button id="btn-cancelar" type="submit">Redefinir Senha</button>
      </div>
    </form>
  </div>

  <div class="invisivel" id="sombra"></div>


  <br><br><br><br><br>

  <!-- Formulário para redefinir a senha -->
  <div class="invisivel" id="redefinir-senha">
    <form onsubmit="return validarCampos()" action="./controller/instituicaocontroller.php" method="post">
      <h1>Redefinir Senha</h1>
      <img id="icon-olho-1" src="./Imagens/icones/visibility_off.svg" alt="">
      <img id="icon-olho-2" src="./Imagens/icones/visibility_off.svg" alt="">
      <img id="icon-olho-3" src="./Imagens/icones/visibility_off.svg" alt="">

      <label for="input-senha">Digite sua senha atual</label>
      <input name="input-senha" id="input-senha" type="password" value="" required autocomplete="off">
      <p class="invisivel" id="erroSenhaAtual">Senha incorreta, tente novamente.</p>

      <label for="input-nova-senha">Digite sua nova senha</label>
      <input name="input-nova-senha" id="input-nova-senha" type="password" value="" required autocomplete="off">

      <label for="input-confirme-senha">Confirme sua nova senha</label>
      <input name="senha" id="input-confirme-senha" type="password" value="" required autocomplete="off">
      <p class="invisivel" id="erroSenha">As senhas digitadas não são iguais. Verifique e tente novamente.</p>

      <div id="btns-redefinir">
        <input type="hidden" name="crud" value="alterarSenha">
        <input name="id" type="hidden" value="<?= $instituicao['id'] ?>">
        <input id="senha-atual" name="senha-atual" type="hidden" value="<?= $instituicao['senha'] ?>">

        <button onclick="fecharTela()" id="btn-confirmar" type="button">Cancelar</button>
        <button id="btn-cancelar" type="submit">Redefinir Senha</button>
      </div>
    </form>
  </div>

  <div class="invisivel" id="sombra"></div>
</div>
<?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>

