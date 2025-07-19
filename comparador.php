
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/comparador.css" />
</head>

<body>

    <?php
    include "header.php"
    ?>
    <div class="comparador-container">
        <h1 class="titulo">Compara y elige <span class="comparador-titulo"> tu moto</span> de acuerdo a tus gustos <i class="fa-solid fa-scale-unbalanced-flip"></i></h1>
        <hr>
        <h2 class="titulo-2">Elige las motos a compara a continuacion , recuerda que puedes elegir hasta 3 modelos :</h2>
        <label class="label-buscador" for="buscador">Añade motos al comparador</label>
        <div class="input-icon">
            <input type="text" id="buscador" placeholder="Ingresa el modelo...">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="results-dropdown-container">
                <div class="results-title">MOTOS:</div>
                <div id="resultados" class="results-dropdown"></div>
            </div>
        </div>
    </div>
    <div id="comparador"></div>
    <?php
    include "footer.php"
    ?>
    <script src="https://kit.fontawesome.com/1842daa51b.js" crossorigin="anonymous"></script>
    <script type="module" src="JS/funcionalidades/index.js"></script>
    <script type="module"  src="JS/funcionalidades/comparador.js"></script>
</body>


</html>
