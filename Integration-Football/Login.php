<?php
require_once './config/globals.php';

$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];
$titulo = 'Página de login';
$pageCSS = ["login.css"];
include_once('./templetes/menu.php');
?>



<body>
<div class="container">
    <div class="card">
        <h2 class="card-title">LOGIN</h2>
        <form id="loginForm" method="POST" action="Login.php" autocomplete="off">
            <div class="form-group">
                <label for="username">Usuário:</label>
                
                <input type="text" name="usuario" id="username" required autocomplete="off">
                <span class="error" id="errorUsername" style="color:red; font-size: 12px;"></span>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="senha" id="password" required autocomplete="off">
                <span class="error" id="errorPassword" style="color:red; font-size: 12px;"></span>
            </div>
         
            <div class="button-container">
                <button type="submit" id="entrar">Entrar</button>
            </div>
            <div class="form-group">
                <label class="inscricao-label">
                    <a href="cadastro.php">Não é inscrito? Inscreva-se!</a>
                </label>
                </div>
</div>
<?php include_once('./templetes/footer.php'); ?>
        </form>

</div>
<?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('config.php');
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"]; // Captura a senha do formulário

        // Determina o tipo de acesso com base no domínio do usuário
        // if (strpos($usuario, '@aluno') !== false) {
            
        // } else if (strpos($usuario, '@professor') !== false) {
        //     $table = 'professores';
        //     $emailField = 'email_professor';
        // } else if (strpos($usuario, '@football') !== false) {
        //     $table = 'instituicao';
        //     $emailField = 'email_instituicao';
        // } else {
        //     echo "<script>alert('Domínio do usuário inválido.');</script>";
        //     exit;
        // }

        // Prepara uma consulta SQL para evitar injeção de SQL
        for ($i=0; $i < 3; $i++) { 
            if($i == 0){
                $table = 'alunos';
                $emailField = 'email_aluno';
            }else if($i == 1){
                $table = 'professores';
                $emailField = 'email_professor';
            }else if($i == 2){
                $table = 'instituicao';
                $emailField = 'email_instituicao';
            }
        
        $stmt = $conn->prepare("SELECT * FROM $table WHERE $emailField = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            $row = $res->fetch_object();
            // Verifica a senha com hashing
            if (md5($senha) === $row->senha) {
                session_regenerate_id(true); // Regenera ID da sessão
                $_SESSION["usuario"] = $usuario;
                
                // Armazena o nome baseado no tipo de usuário
                if ($table === 'alunos') {
                    $_SESSION["nome"] = $row->nome_aluno;
                    $_SESSION["id"] = $row->id_aluno;
                } else if ($table === 'professores') {
                    $_SESSION["nome"] = $row->nome_professor;
                    $_SESSION["id"] = $row->id;
                } else if ($table === 'instituicao') {
                    $_SESSION["nome"] = $row->nome_instituicao;
                    $_SESSION["id"] = $row->id;
                }
                
                // Debugging: Verifica as variáveis de sessão
                var_dump($_SESSION);
                
                // Redireciona para a página correta com base no tipo de usuário
                if ($table === 'alunos') {
                    echo "<script>location.href='principal.php';</script>";
                } else if ($table === 'professores') {
                    echo "<script>location.href='calendarioProfessor.php';</script>";
                } else if ($table === 'instituicao') {
                    echo "<script>location.href='visualizarInscricoes.php';</script>";
                }
        //     } else {
        //         // Senha incorreta
        //         echo "<script>alert('Usuário e/ou senha incorreta(s)');</script>";
        //         echo "<script>location.href='Login.php';</script>";
        //     }
        // }else {
        //     // Usuário não encontrado
        //     echo "<script>alert('Usuário e/ou senha incorreta(s)');</script>";
        //     echo "<script>location.href='Login.php';</script>";
            }
        }
    }
}

?>

<script>
    // Limpa os campos de entrada ao carregar a página
    window.onload = function() {
        document.getElementById('username').value = '';
        document.getElementById('password').value = ''; // Corrigido de "senha" para "password"
    };
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        // Limpa mensagens de erro
        document.getElementById('errorUsername').textContent = '';
        document.getElementById('errorPassword').textContent = '';
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let valid = true; // Variável para verificar se todos os campos são válidos
        // Validação dos campos
        if (!username) {
            document.getElementById('errorUsername').textContent = 'Este campo é obrigatório.';
            valid = false;
        }
        if (!password) {
            document.getElementById('errorPassword').textContent = 'Este campo é obrigatório.';
            valid = false;
        }
        // Se os campos não forem válidos, previne o envio do formulário
        if (!valid) {
            event.preventDefault();
        }
    });
</script>
<!-- PLUG-IN LIBRAS-->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
   
</div>

<!--JAVA LIBRAS-->
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>
</body>



</html>

