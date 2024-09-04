<?php
// Iniciar sessão
session_start();

// Verifica se o usuário está logado e se é ADMIN
if (!isset($_SESSION['usuariologado']) || $_SESSION['tipousuario'] !== 'ADMIN') {
    // Se não estiver logado ou não for ADMIN, redireciona para a página inicial
    header('Location: ./../Index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita - ADMIN</title>
</head>
<body>
    <h1>Bem-vindo à Área Restrita, <?php echo $_SESSION['usuariologado']; ?></h1>
    <p>Aqui apenas administradores têm acesso.</p>

    <!-- Menu de administração -->
    <nav>
        <a href="./CriarBolo.php">Cadastrar novo Bolo</a>
        <span>|</span>
        <a href="./Usuarios.php">Ver usuários</a>
        <span>|</span>
        <a href="./CadastroPessoal.php">Modificar Cadastro</a>
        <span>|</span>
        <a href="./GerenciarBolo.php">Mostrar Bolos</a>
        <span>|</span>
        <a href="./LogOut_Action.php">Sair</a>
    </nav>
</body>
</html>
