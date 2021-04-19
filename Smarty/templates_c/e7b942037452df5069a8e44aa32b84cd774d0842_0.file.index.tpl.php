<?php
/* Smarty version 3.1.39, created on 2021-04-19 11:14:26
  from 'C:\xampp\htdocs\Game\Smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607d49f21c3ab2_49376525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7b942037452df5069a8e44aa32b84cd774d0842' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Game\\Smarty\\templates\\index.tpl',
      1 => 1618823657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_607d49f21c3ab2_49376525 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="row mt-5">
    <div class="col-12 mb-3">
        <h1 class="text-center">Witamy na naszej stronie</h1>
    </div>
    <div class="col-6">
        <a href="index.php?action=register">
            <button class="btn btn-primary w-100">Zarejestruj się</button>
        </a>

    </div>
    <div class="col-6">
        <a href="index.php?action=login">
            <button class="btn btn-primary w-100">Zaloguj się</button>
        </a>

    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
