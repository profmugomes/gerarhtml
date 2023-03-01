<?php
include_once(dirname(__FILE__) . '/gerarhtml.php');

$tpl = new \GerarHTML\gerarhtml();

/* DOCTYPE HTML5 */
echo $tpl->doctype();

/* HTML */
echo $tpl->html(
    $tpl->head(
        $tpl->title('Exemplo')
    ),
    $tpl->body(
        $tpl->div(['style' => 'font-size:12px;',
                   'style' => 'font-weight:bold;'],
                   'Este é um exemplo de como usar a classe GerarHTML!')
    )
);