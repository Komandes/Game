<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Looks.css">
</head>
<body>
<?php
/*pokazanie się planszy*/
    require('class/GameGuts.php');
    require('Index.php');
    $gm = new GameMenager();

    echo $gm->getboardHTML();
    
?>
</body>
</html>