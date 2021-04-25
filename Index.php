<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Looks.css">
</head>
<body onload="prepareBoard()">
<main>
<?php
require('class/GameGuts.php');

    session_start();

    if(isset($_SESSION['gm'])) {
        $gm = $_SESSION['gm'];
    } else {
        $gm = new GameMenager();
        $_SESSION['gm'] = $gm;
    }

?>



<?php

if(isset($_REQUEST['source']) && isset($_REQUEST['target']))
{
    $source = $_REQUEST['source'];
    $target = $_REQUEST['target'];
    echo "<h3>Przesuwam pionek z pola $source na pole $target</h3>";
}
echo $gm->getBoardHTML();
?>
<img id="Królowa" src="./BGFigura/queen.png" alt="królowa">

<div class="panel">
    <header>
        <h1>Szachy</h1>
        <p>Czas: 20min</p>
    </header>
<div class="Tura-wrapper">
    <div class="tura">
    <p>Tura grasza: Czarny</p>
    </div>


<div class="Timer">
    <p>Czas: 90 sec</p>

</div>
</div>

<div class="btn-wrapper">
    <button>Poddaj się</button>
</div>

<div class="Killed-wrapper"></div>

</div>

</main>
<script>

    function fieldClick(e){
        let source = document.getElementById('source');
        let target = document.getElementById('target');
        
        if(source.value){
            target.value = e.currentTarget.id;
            document.getElementById('moveFrom').submit();
        } else {
            source.value = e.currentTarget.id;
        }
    }



    function prepareBoard()
    {
        let container = document.getElementById('grid-container');
        container.childNodes.forEach(function(element){
            element.addEventListener("click", fieldClick)
        });
        
    }

</script>
</body>
</html>


