<?php
require __DIR__ . "/../Config/Config.php";
session_start();

// // Verifica se o usuário está logado e se é ADMIN
// if (!isset($_SESSION['usuariologado']) || $_SESSION['tipousuario'] !== 'ADMIN') {
//     echo "Acesso negado.";
//     exit;
// }

// Inicializa variáveis
$nome = '';
$email = '';
$senha = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = filter_input(INPUT_POST, 'Email', FILTER_VALIDATE_EMAIL);
    $Senha = filter_input(INPUT_POST, 'Senha');
    $Nome = filter_input(INPUT_POST, 'Nome');

    if ($Email && $Senha && $Nome) {
        // Atualiza os dados do usuário no banco de dados
        $sql = $pdo->prepare("UPDATE usuarios SET Nome = :Nome, Email = :Email, Senha = :Senha WHERE Email = :Email");
        $sql->bindValue(':Nome', $Nome);
        $sql->bindValue(':Email', $Email);
        $sql->bindValue(':Senha', password_hash($Senha, PASSWORD_DEFAULT)); // Hash para senha

        if ($sql->execute()) {
            echo "Dados atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar os dados.";
        }
    } else {
        echo "Por favor, preencha todos os campos corretamente.";
    }
} else {
    // Obtém os dados do usuário logado
    $email = $_SESSION['usuariologado'];
    $sql = $pdo->prepare("SELECT Nome, Email FROM usuarios WHERE Email = :Email");
    $sql->bindValue(':Email', $email);
    $sql->execute();
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $nome = $usuario['Nome'];
        $email = $usuario['Email'];
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
</head>
<body>
    <h1>Atualizar Dados - <?php echo htmlspecialchars($_SESSION['usuariologado'], ENT_QUOTES, 'UTF-8'); ?></h1>

    <form action="AtualizarDados.php" method="POST">
        <label for="Nome">Nome:</label>
        <input type="text" name="Nome" id="Nome" value="<?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?>" required>
        
        <label for="Email">Email:</label>
        <input type="email" name="Email" id="Email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
        
        <label for="Senha">Senha:</label>
        <input type="password" name="Senha" id="Senha" required>
        
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
