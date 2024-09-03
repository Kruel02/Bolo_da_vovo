<?php
// require __DIR__ . "/partials/header.php";
require __DIR__ . "/../Config/Config.php";
session_start();

$Email = filter_input(INPUT_POST, 'Email');
$Senha = filter_input(INPUT_POST, 'Senha');

if ($Email && $Senha) {
    // Incluindo TipoUsuario na seleção
    $sql = $pdo->prepare('SELECT Email, Senha, TipoUsuario FROM usuarios WHERE Email = :Email');
    $sql->bindValue(':Email', $Email);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $dado = $sql->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($Senha, $dado['Senha'])) {
            $_SESSION['usuariologado'] = $dado['Email'];
            $_SESSION['tipousuario'] = $dado['TipoUsuario'];

            echo "Login realizado com sucesso. Usuário: " . $dado['Email'] . " - Tipo: " . $dado['TipoUsuario'];
            
            // Verificando o tipo de usuário
            if ($dado['TipoUsuario'] === 'ADMIN') {
                // Redireciona para página de administrador
                // header('Location: admin_dashboard.php');
            } else {
                // Redireciona para página de usuário comum
                // header('Location: user_dashboard.php');
            }
            exit;
        } else {
            echo 'Usuário ou senha incorretos.';
        }
    } else {
        echo 'Email não encontrado.';
    }
} else {
    echo 'Por favor, preencha todos os campos corretamente.';
}
?>

<form action="./login.php" method="POST" id="form">
    <div class="form-item">
        <label for="nome-usuario">Usuário:</label>
        <input type="text" name="Email" id="nome-usuario">
    </div>
    <div class="form-item">
        <label for="senha-usuario">Senha:</label>
        <input type="password" name="Senha" id="senha-usuario">
    </div>
    <div>
        <input type="submit" name="btn-action" value="Logar" class="btn btn--verde">
        <a href="./Cadastrar.php" class="btn btn--vermelho">Registrar</a>
    </div>
</form>
