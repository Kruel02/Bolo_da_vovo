<?php
require_once "./Config/Config.php";
session_start(); // Inicia a sessão

// Consulta os bolos
$sql = $pdo->query("SELECT * FROM bolos");
$sql->execute();

if ($sql->rowCount() > 0) {
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Verifica se o usuário está logado -->
    <?php if (isset($_SESSION['usuariologado'])): ?>
        <!-- Se estiver logado, exibe o link para deslogar -->
        <a href="./Pages/LogOut_Action.php">Deslogar</a>
    <?php else: ?>
        <!-- Se não estiver logado, exibe o link para login -->
        <a href="./Pages/Login.php">Login</a>
    <?php endif; ?>
    <?php if (isset($_SESSION['usuariologado'])): ?>
        <!-- Se estiver logado, exibe o link para deslogar -->
        <a href="./Pages/CadastroPessoal.php">Modificar Cadastro</a>
        <?php endif; ?>


    <section class="pizza-cards">
        <?php foreach($dados as $key => $value): ?>
            <div class="cards-area__card">
                <img class="cards-area__image img-bolo" src="<?php echo $value['Foto']; ?>" alt="Imagem do bolo">
                <button class="cards-area__botao-add">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
                <span class="cards-area__preco"><?php echo $value['Preco']; ?></span>
                <span class="cards-area__titulo"><?php echo $value['Nome']; ?></span>
                <p class="cards-area__descricao"><?php echo $value['Descricao']; ?></p>
            </div>
        <?php endforeach; ?>
    </section>

<?php
}
?>

<?php
// require "./../App/Pages/Partials/Carrinho.php";
// require "./../App/Pages/Partials/Footer.php";
// require "./../App/Pages/Partials/Modal.php";
?>
