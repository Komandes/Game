<?php
/* Smarty version 3.1.39, created on 2021-04-19 11:40:11
  from 'C:\xampp\htdocs\Game\plansza.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607d4ffb909ff3_31052904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d25f04217570325f81d9f8a0e2aaac43ae15c88' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Game\\plansza.php',
      1 => 1618796702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607d4ffb909ff3_31052904 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Looks.css">
</head>
<body>
<?php echo '<?php
    ';?>
require('class/GameGuts.php');
    require('Index.php');
    $gm = new GameMenager();

    echo $gm->getboardHTML();
    
<?php echo '?>';?>

</body>
</html><?php }
}
