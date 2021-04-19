<?php
/* Smarty version 3.1.39, created on 2021-04-19 10:30:51
  from 'C:\xampp\htdocs\Game\Smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607d3fbbc2ce87_24745587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8d1b60fa7c1ffc0871f835452007d3540e319b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Game\\Smarty\\templates\\login.tpl',
      1 => 1618818299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_607d3fbbc2ce87_24745587 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="row mt-5">
    <div class="col-4 offset-4">
        <h1 class="text-center mb-3">Logowanie</h1>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="login">
            <label class="form-label" for="emailInput">Adres e-mail:</label>
            <input class="form-control mb-3" type="email" name="email" id="emailInput" required>
            <label class="form-label" for="passwordInput">Hasło:</label>
            <input class="form-control mb-3" type="password" name="password" id="passwordInput">
            <button class="btn btn-primary w-100" type="submit">Zaloguj</button>
        </form>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
