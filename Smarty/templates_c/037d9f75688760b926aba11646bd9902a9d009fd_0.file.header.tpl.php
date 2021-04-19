<?php
/* Smarty version 3.1.39, created on 2021-04-19 09:39:31
  from 'C:\xampp\htdocs\Game\Smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607d33b3e2be24_26184881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '037d9f75688760b926aba11646bd9902a9d009fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Game\\Smarty\\templates\\header.tpl',
      1 => 1618059375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607d33b3e2be24_26184881 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div>    
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['info']->value))) {?>
            <div class="alert alert-info" role="alert">
                <?php echo $_smarty_tpl->tpl_vars['info']->value;?>

            </div>    
        <?php }
}
}
