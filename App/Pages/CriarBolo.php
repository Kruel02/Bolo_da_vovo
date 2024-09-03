<?php
require __DIR__ . "/../Config/Config.php";

// require_once("./../Pages/Partials/Header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Bolo</title>
</head>
<body>
    <main>
            <form action="./CriarBolo_Action.php" method="post">


                <div class="Form-item" >
                    <label for="">Nome do Bolo</label>
                    <input type="text" name="Nome" id="Nome-Pizza">

                </div>
                <div class="Form-item" >
                    <label for="PrecoBolo">Preço</label>
                    <input type="text" name="Preco" id="">

                </div>

                <div class="Form-item" >
                    <label for="Foto">Foto </label>
                    <input type="text" name="Foto" id="">

                </div>

                <div class="Form-item" >
                    <label for="Descrição do Bolo">Descrição</label>
                    <textarea type="text" name="Descricao" id="descricao" cols="30" rows="30"></textarea>

                </div>
                <div>

                    <input type="submit" value="Submit">

                </div>



            </form>





    </main>




</body>
</html>



